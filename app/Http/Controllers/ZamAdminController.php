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
    
    public function search()
    {
        $search_text = $_GET['znajdz'];
        $xd = DB::table('zamowienia')
        ->where('id_zamowienia','LIKE', '%'.$search_text.'%')
        ->when('id_zamowienia')
        ->get();


        return view('zamowieniaadmin/search', compact('xd'));
    }

         public function statsy()
        {
            if($zamadmin->staty == 1)
                {
                $zamadmin->status == 'Złożono';
                } 
                elseif($zamadmin->staty == 2)
                {
                $zamadmin->status == 'Anulowano Klient';
                }
                elseif($zamadmin->staty== 3)
                {
                $zamadmin->status == 'dzialAnulowano NZTK';
                }
                elseif($zamadmin->staty== 4)
                {
                $zamadmin->status == 'Produkcja';
                }
                elseif($zamadmin->staty== 5)
                {
                $zamadmin->status == 'Gotowe';
                }
                elseif($zamadmin->staty== 6)
                {
                $zamadmin->status == 'Usunięto';
                }
        }

        public function update(Request $request, $id)
    {
        $this->validate($request,[
            'imie' => 'required|max:45',
            'nazwisko' => 'required|max:45',
            'pesel' => 'required|digits:11',
            'email' => 'required|max:45',
            'id_wydzialu' => 'required',
            'data_urodzenia' => 'required',
            'stanowisko' => 'required|max:45',
            'czy_kierownik' => 'required',
            'wynagrodzenie_miesieczne' => 'required|numeric',
            'lata_pracy' => 'required|numeric',
            'wykorzystany_urlop' => 'required|numeric',
            'czy_zwolniony' => 'required',
            ]);

        
        $x=$pracownicy->id_wydzialu;
        $pracownicy->id_wydzialu = $request->id_wydzialu;
        if($x!=$pracownicy->id_wydzialu)
        {
            $checkx=1;
        }
        $pracownicy->data_urodzenia = $request->data_urodzenia;
        $y=$pracownicy->stanowisko;
        $pracownicy->stanowisko = $request->stanowisko;
        $pracownicy->czy_kierownik = $request->czy_kierownik;
        if($pracownicy->czy_kierownik==1)
        {
            $pracownicy->stanowisko='Kierownik';
        }
        else
        {
            if($pracownicy->stanowisko=='Kierownik')
            $pracownicy->stanowisko='-';
        }
        if($y!=$pracownicy->stanowisko)
        {
            $checky=1;
        }
        $pracownicy->wynagrodzenie_miesieczne = $request->wynagrodzenie_miesieczne;
        $pracownicy->lata_pracy = $request->lata_pracy;
        $pracownicy->wykorzystany_urlop = $request->wykorzystany_urlop;
        $z=$pracownicy->czy_zwolniony;
        $pracownicy->czy_zwolniony = $request->czy_zwolniony;
        if($z==0)
        {
            if($z!=$pracownicy->czy_zwolniony)
            {
                $checkz=1;
                $pracownicy->id_wydzialu = 6;
                $pracownicy->czy_kierownik = 0;
                $pracownicy->stanowisko = '-';
                $pracownicy->wynagrodzenie_miesieczne =0;
            }
        }
        elseif($z==1)
        {
            if($z!=$pracownicy->czy_zwolniony)
            {
                $checkz=2;
            }
        }

        if($pracownicy->czy_kierownik==1)
        {
            if($pracownicy->id_wydzialu==1)
            {
                $pracownicy->role = 'kierownik_admin';
            }
            elseif($pracownicy->id_wydzialu==2)
            {
                $pracownicy->role = 'kierownik_zamowien';
            }
            elseif($pracownicy->id_wydzialu==3)
            {
                $pracownicy->role = 'kierownik_hr';
            }
            elseif($pracownicy->id_wydzialu==4)
            {
                $pracownicy->role = 'kierownik_produkcji';
            }
            elseif($pracownicy->id_wydzialu==5)
            {
                $pracownicy->role = 'kierownik_magazyn';
            }
        }
        elseif($pracownicy->czy_kierownik==0)
        {
            if($pracownicy->id_wydzialu==1)
            {
               $pracownicy->role = 'admin';
            } 
            elseif($pracownicy->id_wydzialu==2)
            {
               $pracownicy->role = 'dzial_zamowien';
            }
            elseif($pracownicy->id_wydzialu==3)
            {
               $pracownicy->role = 'dzial_hr';
            }
            elseif($pracownicy->id_wydzialu==4)
            {
               $pracownicy->role = 'dzial_produkcji';
            }
            elseif($pracownicy->id_wydzialu==5)
            {
               $pracownicy->role = 'dzial_magazyn';
            }
            elseif($pracownicy->id_wydzialu==6)
            {
               $pracownicy->role = 'pracownik bez dzialu';
            }
        }

        $pracownicy->save(); 

        
        
        
        return redirect(route('zamadmin.index'));
    }

    public function edit($id)
    {
        $pracownicy = User::find($id);
        return view('pracownicy.edit', compact('pracownicy'));
    }
    

}



