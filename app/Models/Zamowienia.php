<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zamowienia extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_zamawiajacego',
        'id_modelu',
        'ilosc',
        'status',
        'data_zlozenia',
        'realizacja',
              
    ];

    protected $table = 'zamowienia';
    public $timestamps = false;
}
 