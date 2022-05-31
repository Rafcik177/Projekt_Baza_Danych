<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StanProdukcji extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_zamowienia',
        'id_modelu',
        'ilosc_obecna',
        'ilosc_docelowa'
    ];

    protected $table = 'stanprodukcji';
    protected $PrimaryKey = 'id';
    protected $keytype = 'int';
    public $timestamps = false;
}
