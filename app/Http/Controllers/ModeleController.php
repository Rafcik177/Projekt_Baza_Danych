<?php

namespace App\Http\Controllers;

use App\Models\Modele;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//ModeleController: CRUD modeli maszyn

class ModeleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = DB::select('SELECT * FROM modele');
        return view('modele.index', compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modele.create');
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
            'nazwa' => 'required',
            'kategoria' => 'required',
            'moc' => 'required',
            'ilosc_miejsc' => 'required',
            'max_predkosc' => 'required',
            'waga' => 'required',
            'cena' => 'required'
        ]);

        DB::statement('INSERT INTO modele(nazwa, kategoria, moc, ilosc_miejsc, max_predkosc,
            waga, cena) VALUES (?,?,?,?,?, ?,?)', [$request->nazwa, $request->kategoria, $request->moc,
            $request->ilosc_miejsc, $request->max_predkosc, $request->waga, $request->cena]);
        return redirect(route('modele.index'));
    }

    /**
     * Display the specified resource
     *
     * @param  \App\Models\Modele  $model
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = DB::select('SELECT * FROM modele WHERE id=?', [$id])[0];
        $czesci = DB::select('SELECT id, nazwa_czesci, ilosc_do_wykonania FROM czesci
            WHERE id_modelu=?', [$id]);
        return view('modele.show', compact('model', 'czesci'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modele  $model
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = DB::select('SELECT * FROM modele WHERE id=?', [$id])[0];
        return view('modele.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modele  $model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nazwa' => 'required',
            'kategoria' => 'required',
            'moc' => 'required',
            'ilosc_miejsc' => 'required',
            'max_predkosc' => 'required',
            'waga' => 'required',
            'cena' => 'required'
            ]);
        
        DB::statement('UPDATE modele SET nazwa=?, kategoria=?, moc=?, ilosc_miejsc=?, max_predkosc=?,
            waga=?, cena=? WHERE id=?', [$request->nazwa, $request->kategoria, $request->moc,
            $request->ilosc_miejsc, $request->max_predkosc, $request->waga, $request->cena, $id]);

        return redirect(route('modele.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modele  $model
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::statement('DELETE FROM modele WHERE id = ?', [$id]);
        return redirect()->back();
    }
}

