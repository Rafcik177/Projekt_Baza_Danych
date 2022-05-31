<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modele extends Model
{
    use HasFactory;

    protected $fillable = [
        'nazwa',
        'kategoria',
        'moc',
        'ilosc_miejsc',
        'max_predkosc',
        'waga',
        'cena',
        'opis',
              
    ];

    protected $table = 'modele';
    public $timestamps = false;
}
