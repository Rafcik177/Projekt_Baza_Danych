<?php

namespace App\Http\Controllers;

use App\Models\Modele;
use App\Models\SpisCzesci;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $model = Modele::find($id);
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

        $spis = new SpisCzesci;
        $spis->nazwa_czesci = $request->nazwa_czesci;
        $spis->ilosc_do_wykonania = $request->ilosc_do_wykonania;
        $spis->id_modelu = $request->id_modelu;
        $spis->save();

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
        SpisCzesci::where('id', $id)->delete();
        return redirect()->back();
    }
}
