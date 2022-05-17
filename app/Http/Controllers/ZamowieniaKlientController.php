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
        $zamowienia = DB::table('zamowienia')->where('id_zamawiajacego', Auth::user()->id)->paginate(10);
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
        //tutaj utwórz numer zamówienia. Możesz zmiksować id zamawiającego, datę i czas i rakiegoś randa i potem wg tego numeru zamówienia będzie się robiło wyszukiwania
        $count = count( $request->pojazd);
        for($i=0; $i<=$count-1; $i++)
        {
            $zamowienie = new Zamowienia($request->all());
            $zamowienie->id_zamawiajacego = Auth::user()->id;
            $zamowienie->id_modelu = $request->pojazd[$i];
            $iloscPojazdow=$zamowienie->ilosc = $request->ilosc[$i];
            $zamowienie->status = "Złożono";
            $zamowienie->data_zlozenia= now();
            $zamowienie->realizacja= 0;
            $cenamodelu = DB::table('modele')->where('id', $request->pojazd[$i])->first();
            $cenapojazdu=$cenamodelu->cena;
            $calkowitacena=$cenapojazdu*$iloscPojazdow;
            $zamowienie->cena= $calkowitacena;
            $zamowienie->id_zamowienia= 1;
            if($iloscPojazdow!=0)
            {
                $zamowienie->save();
            }
        
        }
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zamowienia = Zamowienia::find($id);
        return view('zamowieniaKlient/edytujZamowienie', compact('zamowienia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
