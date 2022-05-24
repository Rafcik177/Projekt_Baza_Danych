<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zamowienia;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class ZamowieniaKlientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //tutaj zmiana musi być. Trzeba brać z bazy id zamówienia, które będzie tworzone podczas dodawania do bazy
        $zamowienia = DB::table('zamowienia')->where('id_zamawiajacego', Auth::user()->id)->where('id_zamowienia', '<>', '')->paginate(10);
        return view('zamowieniaKlient/index', ['zamowienia' => $zamowienia]);
    }
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modele = DB::table('modele')->orderBy('kategoria')->paginate(30);
        return view('/zamowieniaKlient/dodajZamowienie', ['modele' => $modele]);
        //do składania zamówienia musi być dołączony moduł srawdzający zasoby magazynu do danego modelu. Jeśli nie ma części, klient nie może zamówić pojazdu, w innym wypadku obliczana jest maksymalna ilość pojazdów z dostępnych części. 
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Tutaj też trzeba powtórzyć moduł do sprawdzania zasobów magazynu do wybranych modeli - to jest w celach bezpieczeństwa - walidacja formularza. Jeśli klient wybierze więcej pojazdów niż jest dostępnych części w magazynie, to wówczas tutaj ta akcja musi być zablokowana i klient zostanie cofnięty do formularza. 
        $userID=Auth::user()->id;
        $datatime=date("Y-m-d H:i:s");
        $teraz = strtotime($datatime);
        $numer_zamowienia = $userID.$teraz;
        $count = count( $request->pojazd);
        $suma=0;
        for($i=0; $i<=$count-1; $i++)
        {
            $suma=$suma+ $request->ilosc[$i];
        }
        
        $calkowita_kwota= 0;
        for($i=0; $i<=$count-1; $i++)
        {
            $zamowienie = new Zamowienia($request->all());
            $zamowienie->id_zamawiajacego = $userID;
            $zamowienie->id_zamowienia = '';
            $zamowienie->id_modelu = $request->pojazd[$i];
            $iloscPojazdow=$zamowienie->ilosc = $request->ilosc[$i];
            $zamowienie->status = "Złożono";
            $zamowienie->data_zlozenia= $datatime;
            $zamowienie->realizacja= 0;
            $cenamodelu = DB::table('modele')->where('id', $request->pojazd[$i])->first();
            $cenapojazdu=$cenamodelu->cena;
            $calkowitacena=$cenapojazdu*$iloscPojazdow;
            $calkowita_kwota=$calkowita_kwota+$calkowitacena;
            $zamowienie->cena= $calkowitacena;
            $zamowienie->odnosnie_id_zamowienia= $numer_zamowienia;
            if($iloscPojazdow!=0)
            {
               $zamowienie->save();
            }
        }
        DB::insert('INSERT INTO zamowienia (id_zamawiajacego, id_zamowienia, status, data_zlozenia, realizacja, cena, odnosnie_id_zamowienia ) values (?, ?,?,?,?,?,?)', [$userID, $numer_zamowienia, "Złożono", $datatime, "0",$calkowita_kwota, '']);
        return redirect(route('zamowienia.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $glowne = DB::table('zamowienia')->where('id_zamawiajacego', Auth::user()->id)->where('id_zamowienia', '=', $id)->get();
        if ($glowne->isEmpty()) {
           
            return redirect()->action([ZamowieniaKlientController::class, 'index']);
         }
         else
         {
            $pokaz = DB::table('zamowienia')
            ->join('modele', 'modele.id','=','zamowienia.id_modelu')
            ->select('modele.nazwa','modele.cena as pojedyncza_cena','zamowienia.ilosc','zamowienia.cena as laczna_cena')
            ->where('id_zamawiajacego', Auth::user()->id)
            ->where('odnosnie_id_zamowienia', '=', $id)->get() ;
            
            return view('zamowieniaKlient/show', compact('pokaz', 'id','glowne'));
         }
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $edycja = DB::table('zamowienia')
        ->join('modele', 'modele.id','=','zamowienia.id_modelu')
        ->select('modele.nazwa','modele.cena as pojedyncza_cena','zamowienia.id','zamowienia.ilosc','zamowienia.cena as laczna_cena')
        ->where('id_zamawiajacego', Auth::user()->id)
        ->where('odnosnie_id_zamowienia', '=', $id)->get() ;
        if ($edycja === null) {
            $error="Nie ma takiego zamówienia";
            return redirect()->action([ZamowieniaKlientController::class, 'index']);
         }
        $g_data = DB::table('zamowienia')->where('id_zamowienia', $id)->first();
        $data=$g_data->data_zlozenia;
        
        $nowa=new \DateTime();
        $zamow=new \DateTime($data);
        $zamow->modify('+3 day');
        if($zamow<$nowa)
        return redirect()->action([ZamowieniaKlientController::class, 'index']);
        else
        return view('zamowieniaKlient/edytujZamowienie', compact('edycja','id','data'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) //ten id to numer zamówienia do którego się odnosi
    {
        //to będzie proste, sam wiesz
             if(isset($request->zmien))
             {$id_user = Auth::user()->id;
                $count = count( $request->zmien);
                for($i=0; $i<=$count-1; $i++)
                {
                    if($request->ilosc[$i]=='0')
                    {
                        DB::statement("DELETE FROM zamowienia  where id = ".$request->zmien[$i]." AND id_zamawiajacego = '$id_user'"); 
                    }
                    $edycja = Zamowienia::find($request->zmien[$i]);
                    $edycja->ilosc=$request->ilosc[$i];
                    $edycja->id=$request->zmien[$i];


                    $cenazam = DB::table('zamowienia')->where('id', $request->zmien[$i])->first();
                    $nowacena=(($cenazam->cena)/($cenazam->ilosc))*$request->ilosc[$i];
                    $edycja->cena=$nowacena;
                    
                    $roznica_cen=$cenazam->cena-$nowacena;

                    $cenacalosci = DB::table('zamowienia')->where('id_zamowienia', $id)->first();
                    $nowacenacalosci=($cenacalosci->cena)-($roznica_cen);

                    $edycja->update();
                    
                    DB::statement("UPDATE zamowienia SET cena = '$nowacenacalosci' where id_zamowienia = '$id' AND id_zamawiajacego = '$id_user'");
                    return redirect()->action([ZamowieniaKlientController::class, 'show'], [$id]);
                
                }
                
                
             }
             
              
            
            
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
