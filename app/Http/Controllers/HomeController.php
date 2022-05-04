<?php
//https://www.codewall.co.uk/how-to-get-current-user-id-in-laravel/
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function szukajpracownika()
    {
        return view('pracownicy/szukajpracownika');
    }
    public function pracownik(Request $request)
    {
        

        $id= $request->id_pracownika;
            
            $users_count = DB::table('pracownicy')
            ->where('id', '=', $id)
            ->count();
            if($users_count>0)
            {
                $user = DB::table('pracownicy')->where('id', $id)->first();
                $imie=$user->imie;
                $nazwisko=$user->nazwisko;
                $data_urodzenia=$user->data_urodzenia;
                $stanowisko=$user->stanowisko;
                $czy_kierownik=$user->czy_kierownik;
                $id_wydzialu=$user->id_wydzialu;
                $ready=1;
                return view('pracownicy/pracownik',['ready' => $ready, 'imie'=>$imie, 'nazwisko'=>$nazwisko,'data_urodzenia'=>$data_urodzenia,'stanowisko'=>$stanowisko,'id_wydzialu'=>$id_wydzialu,'czy_kierownik'=>$czy_kierownik]);
            }
            else
            {
                $ready=0;
                $error="Nie ma takiego użytkownika";
                return view('pracownicy/pracownik',['error' => $error,'ready' => $ready]);
            }

       
    }
}
