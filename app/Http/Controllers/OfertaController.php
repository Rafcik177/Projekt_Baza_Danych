<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modele = DB::table('modele')->orderBy('kategoria')->get();
        return view('/oferta/index', compact('modele'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modele = DB::table('modele')->where('id',$id)->first();
        return view('/oferta/pokaz', compact('modele'));
    }
    
}
