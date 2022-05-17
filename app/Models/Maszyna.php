<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maszyna extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nazwa',
        'kategoria',
        'moc',
        'ilosc_miejsc',
        'max_predkosc',
        'waga',
        'cena'
    ];

    protected $table = 'modele';
    protected $PrimaryKey = 'id';
    protected $keytype = 'int';
    public $timestamps = false;
}
