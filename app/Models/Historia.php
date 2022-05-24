<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historia extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pracownika',
        'data_start',
        'data_koniec',
        'wydzial',
        'stanowisko',
              
    ];

    protected $table = 'historia';
    public $timestamps = false;

}
