<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pracownicy extends Model
{
    use HasFactory;

    protected $fillable = [
        'imie',
        'nazwisko',
        'pesel',
        'id_wydzialu',
        'data_urodzenia',
        'stanowisko',
        'czy_kierownik',
        'wynagrodzenie_miesieczne',        
    ];

    protected $table = 'pracownicy';
    public $timestamps = false;

}
