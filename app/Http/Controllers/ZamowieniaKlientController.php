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
        $zamowienia = DB::table('zamowienia AS zz')
        ->select("status", "data_zlozenia", "id_zamowienia", DB::raw('(SELECT  sum(ilosc*cena_pojedyncza) FROM `zamowienia` AS aa WHERE zz.id_zamowienia=aa.odnosnie_id_zamowienia) as cena'))
        ->where('id_zamawiajacego', Auth::user()->id)
        ->where('id_zamowienia', '<>', '')
        ->paginate(10);
        
        
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
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $userID=Auth::user()->id;
        $datatime=date("Y-m-d H:i:s");
        $teraz = strtotime($datatime);
        $numer_zamowienia = $userID.$teraz;
        $count = count( $request->pojazd);
        $liczba_skladowa=0;
       
        for($i=0; $i<=$count-1; $i++)
        {
            $zamowienie = new Zamowienia($request->all());
            $zamowienie->id_zamawiajacego = $userID;
            $zamowienie->id_zamowienia = '';
            $zamowienie->id_modelu = $request->pojazd[$i];
            $liczba = RezerwowanieCzesci::wyliczanie_ilosci_modeli($request->pojazd[$i]);
            $iloscPojazdow=$zamowienie->ilosc = $request->ilosc[$i];
            $zamowienie->data_zlozenia= $datatime;
            $zamowienie->realizacja= 0;
            $model = DB::table('modele')->where('id', $request->pojazd[$i])->first();
            $zamowienie->nazwa_modelu= $model->nazwa;
            $cenapojazdu=$model->cena;
            $zamowienie->cena_pojedyncza= $cenapojazdu;
            $zamowienie->odnosnie_id_zamowienia= $numer_zamowienia;
            if($liczba<$request->ilosc[$i])
            {
                return redirect()->action([ZamowieniaKlientController::class, 'create']);  
            }
            else if($iloscPojazdow!=0)
            {
                $liczba_skladowa++;
                RezerwowanieCzesci::zarezerwuj_czesci_do_modelu($request->pojazd[$i], $iloscPojazdow);
                $zamowienie->save();
               
            }
            
        }
        if($liczba_skladowa>0)
        DB::insert('INSERT INTO zamowienia (id_zamawiajacego, id_zamowienia, status, data_zlozenia, realizacja, cena_pojedyncza, odnosnie_id_zamowienia ) values (?, ?,?,?,?,?,?)', [$userID, $numer_zamowienia, "Złożono", $datatime, "0",'', '']);
        
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
            ->select('id_modelu','nazwa_modelu','ilosc','cena_pojedyncza', DB::raw('ilosc*cena_pojedyncza as laczna_cena',)) 
            ->where('id_zamawiajacego', Auth::user()->id)
            ->where('odnosnie_id_zamowienia', '=', $id)->get() ;
            
            $laczna_cena=DB::table('zamowienia')
            ->where('id_zamawiajacego', Auth::user()->id)
            ->where('odnosnie_id_zamowienia', $id)
            ->sum(DB::raw('ilosc*cena_pojedyncza'));
            
            $kupujacy=DB::table('users')
            ->select('imie', 'nazwisko', 'firma', 'email','adres')
            ->where('id', Auth::user()->id)->first();

            return view('zamowieniaKlient/show', compact('pokaz', 'id','glowne','laczna_cena', 'kupujacy'));
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
        ->select('id_modelu','nazwa_modelu','cena_pojedyncza','id','ilosc')
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
        
             if(isset($request->zmien))
             {
                $count = count( $request->zmien);
                for($i=0; $i<=$count-1; $i++)
                {
                    
                    $edycja = Zamowienia::find($request->zmien[$i]);
                    $liczba = RezerwowanieCzesci::wyliczanie_ilosci_modeli_edycja($edycja->id_modelu,$edycja->ilosc);
                    if($liczba<$request->ilosc[$i])
                    { 
                        return redirect()->action([ZamowieniaKlientController::class, 'edit'], [$id]);    
                    }
                    else
                    {
                        $liczba = RezerwowanieCzesci::zarezerwuj_czesci_do_modelu_edycja($edycja->id_modelu,$request->ilosc[$i],$request->zmien[$i]);
                        $edycja->ilosc=$request->ilosc[$i];
                        $edycja->id=$request->zmien[$i];
                        $edycja->update();
                    }
                }    
             }
             return redirect()->action([ZamowieniaKlientController::class, 'show'], [$id]);
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        DB::statement("UPDATE zamowienia SET status='Anulowano-klient' WHERE id_zamowienia='$id'");
        return redirect()->back();
    
    }
}
