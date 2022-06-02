<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RezerwowanieCzesci extends Controller
{
    public function wyliczanie_ilosci_modeli()
    {
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
}
