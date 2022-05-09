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
    
    const TYPES = [
        self::ADMINISTRACJA,
        self::KLIENT,
        self::HR,
        self::MAGAZYN,
        self::ZAMOWIENIA,
        self::PRODUKCJA,
        self::PRACOWNIK_BEZ_DZIALU,
    ];
}