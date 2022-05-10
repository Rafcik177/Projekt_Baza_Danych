<?php

namespace App\Http\Controllers;

use App\Models\Magazyn;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MagazynController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $magazyn = Magazyn::all();
        return view('magazyn.index', compact('magazyn'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('magazyn.create');
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
            'nazwa_czesci' => 'required',
            'opis' => 'required',
            'dlugosc' => 'required',
            'szerokosc' => 'required',
            'wysokosc' => 'required',
            'waga' => 'required',
            'ilosc' => 'required',
            'prog_niskiego_stanu' => 'required',
        ]);

        $magazyn = new Magazyn;
        $magazyn->nazwa_czesci = $request->nazwa_czesci;
        $magazyn->opis = $request->opis;
        $magazyn->dlugosc = $request->dlugosc;
        $magazyn->szerokosc = $request->szerokosc;
        $magazyn->wysokosc = $request->wysokosc;
        $magazyn->waga = $request->waga;
        $magazyn->ilosc = $request->ilosc;
        $magazyn->prog_niskiego_stanu = $request->prog_niskiego_stanu;
        $magazyn->save();

        return redirect(route('magazyn.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Magazyn  $magazyn
     * @return \Illuminate\Http\Response
     */
    public function show(Magazyn $magazyn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Magazyn  $magazyn
     * @return \Illuminate\Http\Response
     */
    public function edit($nazwa_czesci)
    {
        $magazyn = Magazyn::find($nazwa_czesci);
        return view('magazyn.edit', compact('magazyn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Magazyn  $magazyn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nazwa_czesci)
    {
        $this->validate($request,[
            'nazwa_czesci' => 'required',
            'opis' => 'required',
            'dlugosc' => 'required',
            'szerokosc' => 'required',
            'wysokosc' => 'required',
            'waga' => 'required',
            'ilosc' => 'required',
            'prog_niskiego_stanu' => 'required',
            ]);
        $magazyn = Magazyn::find($nazwa_czesci);
        $magazyn->nazwa_czesci = $request->nazwa_czesci;
        $magazyn->opis = $request->opis;
        $magazyn->dlugosc = $request->dlugosc;
        $magazyn->szerokosc = $request->szerokosc;
        $magazyn->wysokosc = $request->wysokosc;
        $magazyn->waga = $request->waga;
        $magazyn->ilosc = $request->ilosc;
        $magazyn->prog_niskiego_stanu = $request->prog_niskiego_stanu;
        $magazyn->save();  
        return redirect(route('magazyn.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Magazyn  $magazyn
     * @return \Illuminate\Http\Response
     */
    public function destroy(Magazyn $magazyn)
    {
        //
    }
}
