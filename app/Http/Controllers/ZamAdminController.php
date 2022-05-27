<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ZamAdmin;
use App\Models\Zamowienia;

use DB;

class ZamAdminController extends Controller
{
    
    public static function zamowieniaadmin()
    {
        $glowne = DB::table('zamowienia')->whereRaw('id_zamowienia > 0 ')->count();
        return $glowne;
    }

    public function index()
    {
        $zamadmin = DB::table('zamowienia')->whereRaw('id_zamowienia > 0 ')->get();
        return view('zamowieniaadmin.index', ['zamadmin'=>$zamadmin]);
    }

    public function show($id)
    {
        $glowne = DB::table('zamowienia')->where('id_zamowienia', '=', $id)->get();
        if ($glowne->isEmpty()) {
           
            return redirect()->action([ZamAdminController::class, 'wypisz']);
         }
         else
         {
            $pokaz = DB::table('zamowienia')
            ->join('modele', 'modele.id','=','zamowienia.id_modelu')
            ->select('modele.nazwa','modele.cena as pojedyncza_cena','zamowienia.ilosc','zamowienia.cena as laczna_cena')
            ->where('odnosnie_id_zamowienia', '=', $id)->get() ;
            
            return view('zamowieniaadmin/show', compact('pokaz', 'id','glowne'));
         }
        
        
    }
    
}

