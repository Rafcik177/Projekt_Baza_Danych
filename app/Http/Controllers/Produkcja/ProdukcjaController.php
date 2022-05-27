<?php

namespace App\Http\Controllers\Produkcja;

use App\Models\StanProdukcji;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


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
        $stan = StanProdukcji::all();
        return view('produkcja.index', compact('stan'));
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
            'id_modelu' => 'required',
            'ilosc_docelowa' => 'required'
        ]);

        $stan = new StanProdukcji;
        $stan->id_zamowienia = $request->id_zamowienia;
        $stan->id_modelu = $request->id_modelu;
        $stan->ilosc_obecna = 0; //default value
        $stan->ilosc_docelowa = $request->ilosc_docelowa;
        $stan->save();

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
        $stan = StanProdukcji::findOrFail($id);
        return view('produkcja.show', compact('stan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StanProdukcji  $stan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stan = StanProdukcji::find($id);
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
            'id_modelu' => 'required',
            'ilosc_obecna' => 'required',
            'ilosc_docelowa' => 'required'
        ]);

        $stan = StanProdukcji::find($id);
        $stan->id_zamowienia = $request->id_zamowienia;
        $stan->id_modelu = $request->id_modelu;
        $stan->ilosc_obecna = $request->ilosc_obecna;
        $stan->ilosc_docelowa = $request->ilosc_docelowa;
        $stan->save();

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
        StanProdukcji::where('id', $id)->delete();
        return redirect()->back();
    }
}
