<?php

namespace App\Http\Controllers;

use App\Models\Urlopy;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class UrlopyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urlopy = DB::select('SELECT * FROM urlopy');
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

        DB::statement('INSERT INTO urlopy(id_pracownika, rok, dni_wykorzystane, dni_max) 
        VALUES (?,?,?,?)', [$request->id_pracownika, $request->rok, $request->dni_wykorzystane,
        $request->dni_max]);

        return redirect(route('pracownicy.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Urlopy  $urlopy
     * @return \Illuminate\Http\Response
     */
    public function show($id_pracownika)
    {
        $urlopy = DB::select('SELECT * FROM urlopy WHERE id_pracownika=?', [$id_pracownika]);
        $pracownicy = DB::select('SELECT * FROM users WHERE id=?', [$id_pracownika]);

        return view('urlopy.show', compact('urlopy', 'pracownicy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Urlopy  $urlopy
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $urlopy = DB::select('SELECT * FROM urlopy WHERE id=?', [$id])[0];
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
            'dni_wykorzystane' => 'required',
            'dni_max' => 'required',
            ]);

        DB::statement('UPDATE urlopy SET dni_wykorzystane=?, dni_max=?
        WHERE id=?', [$request->dni_wykorzystane, $request->dni_max, $id]);

        $urlopy = Urlopy::find($id);
        $urlopy->save();  

        return redirect(route('urlopy.show', $urlopy->id_pracownika));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Urlopy  $urlopy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::statement('DELETE FROM urlopy WHERE id = ?', [$id]);
        return redirect()->back();
    }
}
