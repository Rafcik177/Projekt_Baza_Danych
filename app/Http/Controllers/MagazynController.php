<?php

namespace App\Http\Controllers;

use App\Models\Magazyn;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Nullable;
use Illuminate\Support\Facades\DB;
class MagazynController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $magazyn = DB::select('SELECT * FROM magazyn');
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
            'id_czesci' => 'required|max:45',
            'opis' => 'required|max:45',
            'dlugosc' => 'required|numeric',
            'szerokosc' => 'required|numeric',
            'wysokosc' => 'required|numeric',
            'waga' => 'required|numeric',
            'ilosc' => 'required|numeric',
            'prog_niskiego_stanu' => 'required|numeric',
        ]);

        DB::statement('INSERT INTO magazyn(id_czesci, opis, dlugosc, szerokosc, wysokosc,
        waga, ilosc, prog_niskiego_stanu, zarezerwowano_ilosc) VALUES (?,?,?,?,?,?,?,?,?)', [$request->id_czesci, $request->opis, $request->dlugosc,
        $request->szerokosc, $request->wysokosc, $request->waga, $request->ilosc, $request->prog_niskiego_stanu, NULL]);

        return redirect(route('magazyn.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Magazyn  $magazyn
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $magazyn = DB::select('SELECT * FROM magazyn WHERE id_czesci=?', [$id])[0];
        $czesci = DB::select('SELECT * FROM czesci WHERE id=?', [$id])[0];

        return view('magazyn.show', compact('magazyn', 'czesci'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Magazyn  $magazyn
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $magazyn = DB::select('SELECT * FROM magazyn WHERE id=?', [$id])[0];
        return view('magazyn.edit', compact('magazyn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Magazyn  $magazyn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'opis' => 'required|max:45',
            'dlugosc' => 'required|numeric',
            'szerokosc' => 'required|numeric',
            'wysokosc' => 'required|numeric',
            'waga' => 'required|numeric',
            'ilosc' => 'required|numeric',
            'prog_niskiego_stanu' => 'required|numeric',
            ]);
        
        DB::statement('UPDATE magazyn SET opis=?, dlugosc=?, szerokosc=?,
        wysokosc=?, waga=?, ilosc=?, prog_niskiego_stanu=? WHERE id=?', [$request->opis, $request->dlugosc,
        $request->szerokosc, $request->wysokosc, $request->waga, $request->ilosc, $request->prog_niskiego_stanu, $id]);
        
        return redirect(route('magazyn.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Magazyn  $magazyn
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::statement('DELETE FROM magazyn WHERE id = ?', [$id]);
        return redirect()->back();
    }

    
}
