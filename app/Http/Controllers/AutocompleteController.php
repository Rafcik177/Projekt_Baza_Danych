<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AutocompleteController extends Controller
{
    public function nr_zam(Request $request)
    {
        $data = DB::select('select id_zamowienia from zamowienia
        where id_zamowienia like ? limit 10',["%".$request->term."%"]);

        $data_pruned=[];
        foreach($data as $d)
        {
            $data_pruned[] = $d->id_zamowienia;
        }
   
        return response()->json($data_pruned);
    }

    public function n_model(Request $request)
    {
        $data = DB::select('select nazwa as name from modele
        where nazwa like ? limit 10',["%".$request->term."%"]);

        //return response()->json($data);

        $data_pruned=[];
        foreach($data as $d)
        {
            $data_pruned[] = $d->name;
        }
   
        return response()->json($data_pruned);
    }
}
