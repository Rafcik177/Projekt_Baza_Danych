<?php

namespace App;

class RoleNZTK
{
    const ADMINISTRACJA = 'admin';
    const KLIENT = 'klient';
    const HR = 'dzial_hr';
    const MAGAZYN = 'dzial_magazyn';
    const ZAMOWIENIA = 'dzial_zamowien';
    const PRODUKCJA = 'dzial_produkcji';
    const PRACOWNIK_BEZ_DZIALU = 'pracownik bez dzialu';

    const KIEROWNIK_ADMINISTRACJA = 'kierownik_admin';
    const KIEROWNIK_HR = 'kierownik_hr';
    const KIEROWNIK_MAGAZYN = 'kierownik_magazyn';
    const KIEROWNIK_ZAMOWIENIA = 'kierownik_zamowien';
    const KIEROWNIK_PRODUKCJA = 'kierownik_produkcji';

    
    const TYPES = [
        self::ADMINISTRACJA,
        self::KLIENT,
        self::HR,
        self::MAGAZYN,
        self::ZAMOWIENIA,
        self::PRODUKCJA,
        self::PRACOWNIK_BEZ_DZIALU,

        self::KIEROWNIK_ADMINISTRACJA,
        self::KIEROWNIK_HR,
        self::KIEROWNIK_MAGAZYN,
        self::KIEROWNIK_ZAMOWIENIA,
        self::KIEROWNIK_PRODUKCJA,
    ];
}