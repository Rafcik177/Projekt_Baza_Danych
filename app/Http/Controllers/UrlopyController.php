<?php

namespace App\Http\Controllers;

use App\Models\Urlopy;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UrlopyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urlopy = Urlopy::all();
        return view('urlopy.index', compact('urlopy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('urlopy.create');
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
            'rok' => 'required',
            'dni_wykorzystane' => 'required',
            'dni_max' => 'required',
        ]);

        $urlopy = new Urlopy;
        $urlopy->id_pracownika = $request->id_pracownika;
        $urlopy->rok = $request->rok;
        $urlopy->dni_wykorzystane = $request->dni_wykorzystane;
        $urlopy->dni_max = $request->dni_max;
        $urlopy->save();

        return redirect(route('urlopy.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Urlopy  $urlopy
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $urlopy = Urlopy::findOrFail($id);
        return view('urlopy.show', compact('urlopy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Urlopy  $urlopy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $urlopy = Urlopy::find($id);
        return view('urlopy.edit', compact('urlopy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Urlopy  $urlopy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'id_pracownika' => 'required',
            'rok' => 'required',
            'dni_wykorzystane' => 'required',
            'dni_max' => 'required',
            ]);

        $urlopy = Urlopy::find($id);
        $urlopy->id_pracownika = $request->id_pracownika;
        $urlopy->rok = $request->rok;
        $urlopy->dni_wykorzystane = $request->dni_wykorzystane;
        $urlopy->dni_max = $request->dni_max;
        $urlopy->save();  

        return redirect(route('urlopy.index'));   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Urlopy  $urlopy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Urlopy::where('id', $id)->delete();
        return redirect()->back();
    }
}
