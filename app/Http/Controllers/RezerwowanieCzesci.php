<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RezerwowanieCzesci extends Controller
{
    public static function wyliczanie_ilosci_modeli($id_modelu)
    {
        $max_ilosc_modeli = array();
        $pobierz_liczbe_czesci=DB::select("Select * from czesci WHERE id_modelu=$id_modelu");
        //$pobierz_liczbe_czesci = DB::table('czesci')->where('id_modelu', $id_modelu)->get();
        $policz_wszystkie_czesci_do_modelu = count($pobierz_liczbe_czesci);
        if ($policz_wszystkie_czesci_do_modelu > 0) {
            foreach ($pobierz_liczbe_czesci as $czesc) {

                $zapytaj = DB::table('magazyn')->where('id_czesci', '=', $czesc->id)->first();
                
                $max_ilosc_modeli[] = (int)((($zapytaj->ilosc) - ($zapytaj->zarezerwowano_ilosc)) / $czesc->ilosc_do_wykonania);
            }
            //print_r($max_ilosc_modeli);
            if (min($max_ilosc_modeli) < 0)
                return "0";
            else
                return min($max_ilosc_modeli);
        } else
            return "0";

        /*
        
        przy każdym elemencie w składaniu zam musi być wywołan funkcja do wyliczenia części. 
        wówczas min wartość to będzie 0 max to ta zwrócona.
         jeśli będzie ona wynosiła 0, to zrobić tego inputa nieaktywnego i wypisać komentarz na czerwono
         jeśli będzie ona wynosiła >0, to wypisać komentarz na zielono z max dost iloscia
        
        select * from czesci where id_modelu = to przekazane do funkcji
        //pętla
            select * from magazyn where id z magazynu = id z czesci;
            lista[] = (ilosc w magazynie-zarezerwowana_ilosc)/ilosc do wykonania;
                potem z tej listy wybierz najmniejszą liczbę i ona będzie liczbą możliwych modeli do wyprodukowania.

        return najmniejsza liczba

        */
    }
    public static function wyliczanie_ilosci_modeli_edycja($id_modelu, $ilosc)
    {
        $max_ilosc_modeli = array();
        $pobierz_liczbe_czesci=DB::select("Select * from czesci WHERE id_modelu=$id_modelu");
       
        $policz_wszystkie_czesci_do_modelu = count($pobierz_liczbe_czesci);
        if ($policz_wszystkie_czesci_do_modelu > 0) {
            foreach ($pobierz_liczbe_czesci as $czesc) {

                $zapytaj = DB::table('magazyn')->where('id_czesci', '=', $czesc->id)->first();
                $max_ilosc_modeli[] = (int)((($zapytaj->ilosc) - ($zapytaj->zarezerwowano_ilosc) + ($ilosc * $czesc->ilosc_do_wykonania)) / ($czesc->ilosc_do_wykonania));
            }
            //print_r($max_ilosc_modeli);
            if (min($max_ilosc_modeli) < 0)
                return "0";
            else
                return min($max_ilosc_modeli);
        } else
            return "0";
    }

    public static function zarezerwuj_czesci_do_modelu($id_modelu, $liczba_modeli)
    {
        //$pobierz_liczbe_czesci = DB::table('czesci')->where('id_modelu', $id_modelu)->get();
        $pobierz_liczbe_czesci=DB::select("Select * from czesci WHERE id_modelu=$id_modelu");
        $policz_wszystkie_czesci_do_modelu = count($pobierz_liczbe_czesci);
        if ($policz_wszystkie_czesci_do_modelu > 0) {
            foreach ($pobierz_liczbe_czesci as $czesc) {
                $rezem_czesci = ($czesc->ilosc_do_wykonania) * $liczba_modeli;
                $zapytaj = DB::table('magazyn')->where('id_czesci', '=', $czesc->id)->first();
                $obecnie_zarezerwowano = $zapytaj->zarezerwowano_ilosc;

                DB::statement("UPDATE magazyn SET zarezerwowano_ilosc=$rezem_czesci+$obecnie_zarezerwowano WHERE id=$zapytaj->id");
            }
        }
    }

    public static function zarezerwuj_czesci_do_modelu_edycja($id_modelu, $liczba_modeli, $id_zam)
    {
        $ilosc_obecna = DB::table('zamowienia')->where('id', '=', $id_zam)->first();
        //$pobierz_liczbe_czesci = DB::table('czesci')->where('id_modelu', $id_modelu)->get();
        $pobierz_liczbe_czesci=DB::select("Select * from czesci WHERE id_modelu=$id_modelu");
        $policz_wszystkie_czesci_do_modelu = count($pobierz_liczbe_czesci);
        if ($policz_wszystkie_czesci_do_modelu > 0) {
            foreach ($pobierz_liczbe_czesci as $czesc) {
                $rezem_czesci = (($czesc->ilosc_do_wykonania) * $liczba_modeli)-($ilosc_obecna->ilosc * $czesc->ilosc_do_wykonania);
                $zapytaj = DB::table('magazyn')->where('id_czesci', '=', $czesc->id)->first();
                $obecnie_zarezerwowano = $zapytaj->zarezerwowano_ilosc;
                

                DB::statement("UPDATE magazyn SET zarezerwowano_ilosc=$rezem_czesci+$obecnie_zarezerwowano WHERE id=$zapytaj->id");
            }
        }
    }
}
