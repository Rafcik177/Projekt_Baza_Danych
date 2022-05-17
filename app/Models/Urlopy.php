<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urlopy extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pracownika',
        'rok',
        'dni_wykorzystane',
        'dnia_max',
              
    ];

    protected $table = 'urlopy';
    public $timestamps = false;
}
