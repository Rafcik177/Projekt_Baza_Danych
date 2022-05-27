<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ZamAdmin;
use DB;

class ZamAdminController extends Controller
{
    
    public static function zamowieniaadmin()
    {
        $glowne = DB::table('zamowienia')->whereRaw('id_zamowienia > 0 ')->count();
        return $glowne;
    }

    public function wypisz()
    {
        $zamadmin = DB::table('zamowienia')->whereRaw('id_zamowienia > 0 ')->get();
        return view('zamowieniaadmin.index', ['zamadmin'=>$zamadmin]);
    }
}

