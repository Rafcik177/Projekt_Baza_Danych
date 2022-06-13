<?php

namespace App\Http\Controllers;

use App\Models\Modele;
use App\Models\SpisCzesci;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpisyCzesciController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modele  $model
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = DB::select('SELECT * FROM modele WHERE id=?', [$id])[0];
        return view('spisyczesci.edit', compact('model'));
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
            'ilosc_do_wykonania' => 'required'
            ]);

        DB::statement('INSERT INTO czesci(nazwa_czesci, ilosc_do_wykonania, id_modelu) VALUES
            (?,?,?)',[$request->nazwa_czesci, $request->ilosc_do_wykonania, $request->id_modelu]);

        return redirect(route('spisyczesci.edit', $request->id_modelu));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SpisCzesci  $spis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::statement('DELETE FROM czesci WHERE id = ?', [$id]);
        return redirect()->back();
    }
}
