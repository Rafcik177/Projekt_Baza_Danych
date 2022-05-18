<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zamowienia;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //tutaj utwórz numer zamówienia. Możesz zmiksować id zamawiającego,
        // datę i czas i rakiegoś randa i potem wg tego numeru zamówienia
         // będzie się robiło wyszukiwania
         
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
        
        $pokaz = DB::table('zamowienia')
        ->join('modele', 'modele.id','=','zamowienia.id_modelu')
        ->select('modele.nazwa','modele.cena as pojedyncza_cena','zamowienia.ilosc','zamowienia.cena as laczna_cena')
        ->where('id_zamawiajacego', Auth::user()->id)
        ->where('odnosnie_id_zamowienia', '=', $id)->get() ;
        return view('zamowieniaKlient/show', compact('pokaz','id'));
        
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
        return view('zamowieniaKlient/edytujZamowienie', compact('edycja','id'));
        
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
            $zamowienie = new Zamowienia($request->all());
            $count = count( $request->zmien);

            for($i=0; $i<=$count-1; $i++)
            {

            }
           // $zamowienie->update();
            
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
