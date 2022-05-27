<?php

namespace App\Http\Controllers;

use App\Models\Modele;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//ModeleController: CRUD modeli maszyn

class ModeleController extends Controller
{
    /*public function index()
    {
        $maszyna = Maszyna::all();
        return view('produkcja.index', compact('maszyna'));
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Modele::all();
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

        $model = new Modele;
        $model->nazwa = $request->nazwa;
        $model->kategoria = $request->kategoria;
        $model->moc = $request->moc;
        $model->ilosc_miejsc = $request->ilosc_miejsc;
        $model->max_predkosc = $request->max_predkosc;
        $model->waga = $request->waga;
        $model->cena = $request->cena;
        $model->save();

        return redirect(route('modele.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modele  $model
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Modele::findOrFail($id);
        return view('modele.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maszyna  $maszyna
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Modele::find($id);
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
        $model = Modele::find($id);
        $model->nazwa = $request->nazwa;
        $model->kategoria = $request->kategoria;
        $model->moc = $request->moc;
        $model->ilosc_miejsc = $request->ilosc_miejsc;
        $model->max_predkosc = $request->max_predkosc;
        $model->waga = $request->waga;
        $model->cena = $request->cena;
        $model->save();

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
        Modele::where('id', $id)->delete();
        return redirect()->back();
    }
}

