<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ZamAdmin;
use App\Models\Zamowienia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;




class ZamAdminController extends Controller
{
    
    public static function zamowieniaadmin()
    {
        $glowne = DB::table('zamowienia')->whereRaw('id_zamowienia > 0 ')->count();
        return $glowne;
    }

    public function index()
    {
        $zamadmin = DB::table('zamowienia AS zz')
        ->select("id_zamawiajacego","status", "data_zlozenia", "id_zamowienia", DB::raw('(SELECT  sum(ilosc*cena_pojedyncza) FROM `zamowienia` AS aa WHERE zz.id_zamowienia=aa.odnosnie_id_zamowienia) as cena'))
        ->where('id_zamowienia', '<>', '')
        ->paginate(10);

       

        return view('zamowieniaadmin/index', ['zamadmin' => $zamadmin]);
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
            ->select('id_modelu','nazwa_modelu','ilosc','cena_pojedyncza', DB::raw('ilosc*cena_pojedyncza as laczna_cena',)) 
            ->where('id_zamawiajacego', Auth::user()->id)
            ->where('odnosnie_id_zamowienia', '=', $id)->get() ;

            $laczna_cena=DB::table('zamowienia')
            ->where('id_zamawiajacego', Auth::user()->id)
            ->where('odnosnie_id_zamowienia', $id)
            ->sum(DB::raw('ilosc*cena_pojedyncza'));
            
            $kupujacy=DB::table('users')
            ->select('imie', 'nazwisko', 'firma', 'email')
            ->where('id', Auth::user()->id)->first();


            
            return view('zamowieniaadmin/show', compact('pokaz', 'id','glowne','laczna_cena', 'kupujacy'));
         }
        
        
    }
    
    public function search(Request $request)
    {
        $search_text = $request->znajdz;
        $zamadmin =  $zamadmin = DB::table('zamowienia AS zz')
        ->select("id_zamawiajacego","status", "data_zlozenia", "id_zamowienia", DB::raw('(SELECT  sum(ilosc*cena_pojedyncza) FROM `zamowienia` AS aa WHERE zz.id_zamowienia=aa.odnosnie_id_zamowienia) as cena'))
        ->where('id_zamowienia', '<>', '')
        ->where('id_zamowienia','LIKE', '%'.$search_text.'%')
        ->get();

        return view('zamowieniaadmin/search', compact('zamadmin'));

    }
    
    public function edit($id)
    {
        
        $edycja = DB::table('zamowienia')
        ->select('id_modelu','nazwa_modelu','cena_pojedyncza','id','ilosc')
        ->where('id_zamawiajacego', Auth::user()->id)
        ->where('odnosnie_id_zamowienia', '=', $id)->get() ;
        if ($edycja === null) {
            $error="Nie ma takiego zamówienia";
            return redirect()->action([ZamowieniaKlientController::class, 'index']);
         }
        $g_data = DB::table('zamowienia')->where('id_zamowienia', $id)->first();
        $data=$g_data->data_zlozenia;
        
        $nowa=new \DateTime();
        $zamow=new \DateTime($data);
        $zamow->modify('+3 day');
        if($zamow<$nowa)
        return redirect()->action([ZamowieniaKlientController::class, 'index']);
        else
        return view('zamowieniaadmin/edit', compact('edycja','id','data'));
        
    }

}



