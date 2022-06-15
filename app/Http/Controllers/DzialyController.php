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
        $dzialy = DB::select('SELECT * FROM dzialy');
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

        DB::statement('INSERT INTO dzialy(nazwa) VALUES (?)', [$request->nazwa]);

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
            $dzial = DB::select('SELECT * FROM users WHERE id_wydzialu=1');
            $nazwa='Dział administracji - lista pracowników';
        }
        elseif($id==2)
        {
            $dzial = DB::select('SELECT * FROM users WHERE id_wydzialu=2');
            $nazwa='Dział zamówień - lista pracowników';
        }
        elseif($id==3)
        {
            $dzial = DB::select('SELECT * FROM users WHERE id_wydzialu=3');
            $nazwa='Dział HR - lista pracowników';
        }
        elseif($id==4)
        {
            $dzial = DB::select('SELECT * FROM users WHERE id_wydzialu=4');
            $nazwa='Dział produkcji - lista pracowników';
        }
        elseif($id==5)
        {
            $dzial = DB::select('SELECT * FROM users WHERE id_wydzialu=5');
            $nazwa='Dział Magazyn - lista pracowników';
        }
        elseif($id==6)
        {
            $dzial = DB::select('SELECT * FROM users WHERE id_wydzialu=6');
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

}
