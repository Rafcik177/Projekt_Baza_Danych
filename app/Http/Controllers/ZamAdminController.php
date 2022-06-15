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
        //$glowne = DB::table('zamowienia')->whereRaw('id_zamowienia > 0 ')->count();
        $glowne = DB::select('SELECT * FROM zamowienia WHERE id_zamowienia > 0');
        return $glowne;
    }

    public function index()
    {
       // $zamadmin = DB::table('zamowienia AS zz')
       // ->select("id_zamawiajacego","status", "data_zlozenia", "id_zamowienia", DB::raw('(SELECT  sum(ilosc*cena_pojedyncza) FROM `zamowienia` AS aa WHERE zz.id_zamowienia=aa.odnosnie_id_zamowienia) as cena'))
       //->where('id_zamowienia', '<>', '')
       //->get();


        $zamadmin = DB::select ('SELECT *, (SELECT  sum(ilosc*cena_pojedyncza) FROM zamowienia AS aa WHERE zz.id_zamowienia=aa.odnosnie_id_zamowienia) as cena FROM zamowienia as zz WHERE id_zamowienia!=0 GROUP BY id, id_zamawiajacego, id_zamowienia, id_modelu, nazwa_modelu, ilosc, status, data_zlozenia, realizacja, cena_pojedyncza, odnosnie_id_zamowienia, staty');

        //$kupujacy=DB::table('users')
           // ->select('imie', 'nazwisko', 'firma', 'email')
            //->where('id', Auth::user()->id)->first();

        $kupujacy=DB::select ('SELECT imie, nazwisko, firma, email FROM users WHERE id=?', [Auth::user()->id]) [0];

        return view('zamowieniaadmin/index', compact('zamadmin','kupujacy'));
    }

    public function show($id)
    {
        //$glowne = DB::table('zamowienia')->where('id_zamowienia', '=', $id)->get();
        $glowne = DB::select('SELECT * FROM zamowienia WHERE id_zamowienia =?',[$id]);
        if (count($glowne)==0) {
           
            return redirect()->action([ZamAdminController::class, 'wypisz']);
         }
         else
         {
            //$pokaz = DB::table('zamowienia')
            //->select('id_modelu','nazwa_modelu','ilosc','cena_pojedyncza', DB::raw('ilosc*cena_pojedyncza as laczna_cena',)) 
            //->where('id_zamawiajacego', Auth::user()->id)
            //->where('odnosnie_id_zamowienia', '=', $id)->get();

            $pokaz = DB::select('SELECT *, (ilosc*cena_pojedyncza) AS laczna_cena FROM zamowienia WHERE id_zamawiajacego=? AND odnosnie_id_zamowienia=? ',[Auth::user()->id,$id]);

            //$laczna_cena=DB::table('zamowienia')
            //->where('id_zamawiajacego', Auth::user()->id)
            //->where('odnosnie_id_zamowienia', $id)
           // ->sum(DB::raw('ilosc*cena_pojedyncza'));

            //DO POPRAWIENIA BO POKAZUJE 1ZL PRZY ŁĄCZNEJ CENIE 
           // $laczna_cena=DB::select('SELECT id_zamawiajacego, odnosnie_id_zamowienia, (ilosc*cena_pojedyncza) AS laczna_cena FROM zamowienia WHERE id_zamawiajacego=? AND odnosnie_id_zamowienia=?',[Auth::user()->id,$id]);
            $laczna_cena = DB::select('SELECT SUM(ilosc*cena_pojedyncza) AS laczna_cena FROM zamowienia WHERE id_zamawiajacego=? AND odnosnie_id_zamowienia=? ',[Auth::user()->id,$id])[0]->laczna_cena;
           //$kupujacy=DB::table('users')
            //->select('imie', 'nazwisko', 'firma', 'email')
            //->where('id', Auth::user()->id)->first();

            $kupujacy=DB::select ('SELECT imie, nazwisko, firma, email FROM users WHERE id=?', [Auth::user()->id]) [0];

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

        //nie mam pojecia jak wsadzic "LIKE z wpisywanymi danymi"
        //$zamadmin = DB::select ('SELECT *, (SELECT  sum(ilosc*cena_pojedyncza) FROM zamowienia AS aa WHERE zz.id_zamowienia=aa.odnosnie_id_zamowienia) as cena FROM zamowienia as zz WHERE id_zamowienia!=0 AND id_zamowienia LIKE "%?%"',[$search_text]);
        //->where('id_zamowienia','LIKE', '%'.$search_text.'%')
        //->get();

        $kupujacy=DB::select ('SELECT imie, nazwisko, firma, email FROM users WHERE id=?', [Auth::user()->id]) [0];

        return view('zamowieniaadmin/search', compact('zamadmin','kupujacy'));

    }
    
    public function edit($id)
    {
        
        //$edycja = DB::table('zamowienia')
        //->select('id_modelu','nazwa_modelu','cena_pojedyncza','id','ilosc')
        //->where('id_zamawiajacego', Auth::user()->id)
        //->where('odnosnie_id_zamowienia', '=', $id)->get();

        $edycja = DB::select('SELECT * FROM zamowienia where id_zamawiajacego=? AND odnosnie_id_zamowienia=?',[Auth::user()->id,$id]);
        if ($edycja === null) {
            $error="Nie ma takiego zamówienia";
            return redirect()->action([ZamowieniaKlientController::class, 'index']);
         }
        //$g_data = DB::table('zamowienia')->where('id_zamowienia', $id)->first();
        $g_data = DB::select('SELECT * FROM zamowienia WHERE id_zamowienia=?',[$id])[0];
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