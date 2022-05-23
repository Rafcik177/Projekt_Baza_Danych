<?php

namespace App\Http\Controllers\Produkcja;

use App\Models\Maszyna;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


//ProdukcjaController: CRUD maszyn

class ProdukcjaController extends Controller
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
        $maszyna = Maszyna::all();
        return view('produkcja.index', compact('maszyna'));
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
            'nazwa' => 'required',
            'kategoria' => 'required',
            'moc' => 'required',
            'ilosc_miejsc' => 'required',
            'max_predkosc' => 'required',
            'waga' => 'required',
            'cena' => 'required'
        ]);

        $maszyna = new Maszyna;
        $maszyna->nazwa = $request->nazwa;
        $maszyna->kategoria = $request->kategoria;
        $maszyna->moc = $request->moc;
        $maszyna->ilosc_miejsc = $request->ilosc_miejsc;
        $maszyna->max_predkosc = $request->max_predkosc;
        $maszyna->waga = $request->waga;
        $maszyna->cena = $request->cena;
        $maszyna->czy_ukonczona = false; //default value
        $maszyna->save();

        return redirect(route('produkcja.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maszyna  $maszyna
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maszyna = Maszyna::findOrFail($id);
        return view('produkcja.show', compact('maszyna'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maszyna  $maszyna
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maszyna = Maszyna::find($id);
        return view('produkcja.edit', compact('maszyna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maszyna  $maszyna
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
            'cena' => 'required',
            'czy_ukonczona' => 'required'
            ]);
        $maszyna = Magazyn::find($id);
        $maszyna->nazwa = $request->nazwa;
        $maszyna->kategoria = $request->kategoria;
        $maszyna->moc = $request->moc;
        $maszyna->ilosc_miejsc = $request->ilosc_miejsc;
        $maszyna->max_predkosc = $request->max_predkosc;
        $maszyna->waga = $request->waga;
        $maszyna->cena = $request->cena;
        $maszyna->czy_ukonczona = $request->czy_ukonczona;
        $maszyna->save();

        return redirect(route('produkcja.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maszyna  $maszyna
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Maszyna::where('id', $id)->delete();
        return redirect()->back();
    }
}
