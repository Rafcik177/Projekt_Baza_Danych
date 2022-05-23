<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PracownicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pracownicy = User::all()->where('role','<>', 'klient');
        return view('pracownicy.index', compact('pracownicy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pracownicy.create');
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
            'imie' => 'required',
            'nazwisko' => 'required',
            'pesel' => 'required',
            'id_wydzialu' => 'required',
            'data_urodzenia' => 'required',
            'stanowisko' => 'required',
            'czy_kierownik' => 'required',
            'wynagrodzenie_miesieczne' => 'required',
        ]);

        $pracownicy = new User;
        $pracownicy->imie = $request->imie;
        $pracownicy->nazwisko = $request->nazwisko;
        $pracownicy->pesel = $request->pesel;
        $pracownicy->id_wydzialu = $request->id_wydzialu;
        $pracownicy->data_urodzenia = $request->data_urodzenia;
        $pracownicy->stanowisko = $request->stanowisko;
        $pracownicy->czy_kierownik = $request->czy_kierownik;
        $pracownicy->wynagrodzenie_miesieczne = $request->wynagrodzenie_miesieczne;
        $pracownicy->save();

        return redirect(route('pracownicy.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pracownicy  $pracownicy
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pracownicy = User::findOrFail($id);
        return view('pracownicy.show', compact('pracownicy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pracownicy  $pracownicy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pracownicy = User::find($id);
        return view('pracownicy.edit', compact('pracownicy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pracownicy  $pracownicy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'imie' => 'required',
            'nazwisko' => 'required',
            'pesel' => 'required',
            'id_wydzialu' => 'required',
            'data_urodzenia' => 'required',
            'stanowisko' => 'required',
            'czy_kierownik' => 'required',
            'wynagrodzenie_miesieczne' => 'required',
            ]);
        $pracownicy = User::find($id);
        $pracownicy->imie = $request->imie;
        $pracownicy->nazwisko = $request->nazwisko;
        $pracownicy->pesel = $request->pesel;
        $pracownicy->id_wydzialu = $request->id_wydzialu;
        $pracownicy->data_urodzenia = $request->data_urodzenia;
        $pracownicy->stanowisko = $request->stanowisko;
        $pracownicy->czy_kierownik = $request->czy_kierownik;
        $pracownicy->wynagrodzenie_miesieczne = $request->wynagrodzenie_miesieczne;
        $pracownicy->save();  
        return redirect(route('pracownicy.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pracownicy  $pracownicy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back();
    }
}
