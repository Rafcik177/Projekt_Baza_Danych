<?php

namespace App\Http\Controllers;

use App\Models\Dzialy;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DzialyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dzialy = Dzialy::all();
        return view('dzialy.index', compact('dzialy'));
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
            'nazwa' => 'required',
        ]);

        $dzialy = new Dzialy;
        $dzialy->nazwa = $request->nazwa;

        $dzialy->save();

        return redirect(route('dzialy.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dzialy  $dzialy
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($id==1)
        {
            $dzial = DB::table('users')->whereRaw('id_wydzialu = 1')->get();
            $nazwa='Dział administracji - lista pracowników';
        }
        elseif($id==2)
        {
            $dzial = DB::table('users')->whereRaw('id_wydzialu = 2')->get();
            $nazwa='Dział zamówień - lista pracowników';
        }
        elseif($id==3)
        {
            $dzial = DB::table('users')->whereRaw('id_wydzialu = 3')->get();
            $nazwa='Dział HR - lista pracowników';
        }
        elseif($id==4)
        {
            $dzial = DB::table('users')->whereRaw('id_wydzialu = 4')->get();
            $nazwa='Dział produkcji - lista pracowników';
        }
        elseif($id==5)
        {
            $dzial = DB::table('users')->whereRaw('id_wydzialu = 5')->orderby('czy_kierownik', 'DESC')->get();
            $nazwa='Dział Magazyn - lista pracowników';
        }
        elseif($id==6)
        {
            $dzial = DB::table('users')->whereRaw('id_wydzialu = 6')->get();
            $nazwa='Lista pracowników bez przypisanego działu';
        }

        return view('dzialy/show', ['dzial'=>$dzial], ['nazwa'=>$nazwa]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dzialy  $dzialy
     * @return \Illuminate\Http\Response
     */
    public function edit(Dzialy $dzialy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dzialy  $dzialy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dzialy $dzialy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dzialy  $dzialy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dzialy $dzialy)
    {
        //
    }

    public function administacja()
    {
        $administracja = DB::table('users')->whereRaw('id_wydzialu == 1')->get();
        return view('dzialy/administracja', ['administracja'=>$administracja]);
    }

}
