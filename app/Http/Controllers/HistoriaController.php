<?php

namespace App\Http\Controllers;

use App\Models\Historia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class HistoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $historia=DB::table('users')->select('*')->where('role', '<>', 'klient')->get();
        return view('historia.index', compact('historia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'id_pracownika' => 'required',
            'data_start' => 'required',
            'data_koniec' => 'required',
            'wydzial' => 'required',
            'stanowisko' => 'required',
        ]);


        $historia = new Historia;
        $historia->id_pracownika = $request->id_pracownika;
        $historia->data_start = $request->data_start;
        $historia->data_koniec = $request->data_koniec;
        $historia->wydzial = $request->wydzial;
        $historia->stanowisko = $request->stanowisko;
        $historia->save();

        return redirect(route('historia.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Historia  $historia
     * @return \Illuminate\Http\Response
     */
    public function show($id_pracownika)
    {
        $historia=DB::table('historia')->select('*')->where('id_pracownika', $id_pracownika)->get();
        return view('historia.show', compact('historia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Historia  $historia
     * @return \Illuminate\Http\Response
     */
    public function edit(Historia $historia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Historia  $historia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Historia $historia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Historia  $historia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Historia $historia)
    {
        //
    }
}
