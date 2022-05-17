<?php

namespace App\Http\Controllers\Produkcja;

use App\Models\Maszyna;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukcjaController extends Controller
{
    public function index()
    {
        $maszyna = Maszyna::all();
        return view('produkcja.index', compact('maszyna'));
    }
}
