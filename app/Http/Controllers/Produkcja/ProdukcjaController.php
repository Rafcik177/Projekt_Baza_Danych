<?php

namespace App\Http\Controllers\Produkcja;

use App\Models\StanProdukcji;
use App\Models\Zamowienia;
use App\Models\Modele;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


//ProdukcjaController: CRUD stanów produkcji

class ProdukcjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stan = DB::select('SELECT * FROM stanprodukcji');
        $zam_numer = array_map(
            function($v){ return $v->id_zamowienia; },
            DB::select('SELECT z.id_zamowienia FROM stanprodukcji s
            INNER JOIN zamowienia z ON s.id_zamowienia = z.id')
        );
        $model_nazwa = array_map(
            function($v){ return $v->nazwa; },
            DB::select('SELECT m.nazwa FROM stanprodukcji s
            INNER JOIN modele m ON s.id_modelu = m.id')
        );

        return view('produkcja.index', compact('stan','zam_numer','model_nazwa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produkcja.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'id_zamowienia' => 'required',
            'nazwa_modelu' => 'required',
            'ilosc_docelowa' => 'required'
        ]);

        DB::statement('INSERT INTO stanprodukcji(id_zamowienia, id_modelu, ilosc_obecna, ilosc_docelowa)
            VALUES( (SELECT id FROM zamowienia WHERE id_zamowienia = ?),
            (SELECT id FROM modele WHERE nazwa = ?), 0, ?)',
            [$request->id_zamowienia, $request->nazwa_modelu, $request->ilosc_docelowa]);

        return redirect(route('produkcja.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StanProdukcji  $maszyna
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dbdata = DB::select('SELECT s.id_zamowienia AS id_zamowienia, s.id_modelu AS id_modelu,
            s.ilosc_obecna AS stan_il_obecna, s.ilosc_docelowa AS stan_il_docelowa,
            z.id_zamowienia AS zam_numer, m.nazwa AS model_nazwa
            FROM stanprodukcji s INNER JOIN zamowienia z ON s.id_zamowienia = z.id
            INNER JOIN modele m ON s.id_modelu = m.id WHERE s.id = ?', [$id])[0];
        return view('produkcja.show', compact('dbdata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StanProdukcji  $stan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$stan = StanProdukcji::find($id);
        $stan = DB::select('SELECT s.id, z.id_zamowienia, m.nazwa AS nazwa_modelu,
            s.ilosc_obecna, s.ilosc_docelowa FROM stanprodukcji s
            INNER JOIN zamowienia z ON s.id_zamowienia = z.id
            INNER JOIN modele m ON s.id_modelu = m.id WHERE s.id = ?',[$id])[0];
        return view('produkcja.edit', compact('stan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maszyna  $stan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'id_zamowienia' => 'required',
            'nazwa_modelu' => 'required',
            'ilosc_obecna' => 'required',
            'ilosc_docelowa' => 'required'
        ]);
        
        DB::statement('UPDATE stanprodukcji SET id_zamowienia = (SELECT id FROM zamowienia WHERE id_zamowienia = ?),
            id_modelu = (SELECT id FROM modele WHERE nazwa = ?), ilosc_obecna = ?, ilosc_docelowa = ?
            WHERE id = ?', [$request->id_zamowienia, $request->nazwa_modelu,
            $request->ilosc_obecna, $request->ilosc_docelowa, $id]);
        
        return redirect(route('produkcja.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StanProdukcji  $stan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::statement('DELETE FROM stanprodukcji WHERE id = ?', [$id]);
        return redirect()->back();
    }
}
