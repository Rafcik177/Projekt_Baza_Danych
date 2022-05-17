<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontrahenci extends Model
{
    use HasFactory;

    protected $fillable = [
        'imie',
        'nazwisko',
        'firma',
        'adres',
              
    ];

    protected $table = 'kontrahenci';
    public $timestamps = false;
}
