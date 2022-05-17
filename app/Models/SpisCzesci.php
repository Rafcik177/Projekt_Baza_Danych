<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//This model describes atble "czesci", which binds "modele" and "magazyn"
class SpisCzesci extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nazwa_czesci',
        'id_modelu',
        'ilosc_do_wykonania'
    ];

    protected $table = 'czesci';
    protected $PrimaryKey = 'id';
    protected $keytype = 'int';
    public $timestamps = false;
}
