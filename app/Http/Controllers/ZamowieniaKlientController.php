<?php

namespace App\Http\Controllers;

use App\Models\Zamowienia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ZamowieniaKlientController extends Controller
{
    public function index()
    {
        $zamowienia = Zamowienia::all()->where('id_zamawiajacego', Auth::user()->id);
        return view('zamowieniaKlient/index', compact('zamowienia'));
    }

}
