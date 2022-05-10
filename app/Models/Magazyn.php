<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazyn extends Model
{
    use HasFactory;

    protected $fillable = [
        'nazwa_czesci',
        'opis',
        'dlugosc',
        'szerokosc',
        'wysokość',
        'waga',
        'ilosc',
        'prog_niskiego_stanu',        
    ];

    protected $table = 'magazyn';
    protected $PrimaryKey = 'nazwa_czesci';
    protected $keytype = 'string';
    public $timestamps = false;
}
