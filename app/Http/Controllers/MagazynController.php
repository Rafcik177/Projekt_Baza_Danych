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
            'id_czesci' => 'required|max:45',
            'opis' => 'required|max:45',
            'dlugosc' => 'required|numeric',
            'szerokosc' => 'required|numeric',
            'wysokosc' => 'required|numeric',
            'waga' => 'required|numeric',
            'ilosc' => 'required|numeric',
            'prog_niskiego_stanu' => 'required|numeric',
        ]);

        $magazyn = new Magazyn;
        $magazyn->id_czesci = $request->id_czesci;
        $magazyn->opis = $request->opis;
        $magazyn->dlugosc = $request->dlugosc;
        $magazyn->szerokosc = $request->szerokosc;
        $magazyn->wysokosc = $request->wysokosc;
        $magazyn->waga = $request->waga;
        $magazyn->ilosc = $request->ilosc;
        $magazyn->prog_niskiego_stanu = $request->prog_niskiego_stanu;
        $magazyn->zarezerwowano_ilosc = null;
        $magazyn->save();

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
        $magazyn = DB::table('magazyn')->where('id_czesci',$id)->first();
        $czesci = DB::table('czesci')->where('id',$id)->first();
        return view('magazyn.show', ['magazyn' => $magazyn, 'czesci'=>$czesci]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Magazyn  $magazyn
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $magazyn = Magazyn::find($id);
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
            'id_czesci' => 'required|max:45',
            'opis' => 'required|max:45',
            'dlugosc' => 'required|numeric',
            'szerokosc' => 'required|numeric',
            'wysokosc' => 'required|numeric',
            'waga' => 'required|numeric',
            'ilosc' => 'required|numeric',
            'prog_niskiego_stanu' => 'required|numeric',
            ]);
            
        $magazyn = Magazyn::find($id);
        $magazyn->id_czesci = $request->id_czesci;
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
    public function destroy($id)
    {
        Magazyn::where('id', $id)->delete();
        return redirect()->back();
    }

    
}
