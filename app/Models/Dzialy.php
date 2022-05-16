<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dzialy extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nazwa',
      
    ];
    protected $table = 'dzialy';
    public $timestamps = false;
}
