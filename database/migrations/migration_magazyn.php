<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magazyn', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nazwa_czesci');
            $table->string('opis');
            $table->float('dlugosc');
            $table->float('szerokosc');
            $table->float('wysokosc');
            $table->float('waga');
            $table->integer('ilosc');
            $table->integer('prog_niskiego_stanu');
            $table->integer('zarezerwowano_ilosc');
        });


        DB::table('magazyn')->insert(
            array(
                'nazwa_czesci' => 'chłodnica',
                'opis' => 'rate',
                'dlugosc' => 3,
                'szerokosc' => 1,
                'wysokosc' => 3,
                'waga' => 13,
                'ilosc' => 5,
                'prog_niskiego_stanu' => 2,
                'zarezerwowano_ilosc' => 0
            )
        );

        DB::table('magazyn')->insert(
            array(
                'nazwa_czesci' => 'sprężarka',
                'opis' => 'origin',
                'dlugosc' => 4,
                'szerokosc' => 4,
                'wysokosc' => 4,
                'waga' => 5,
                'ilosc' => 7,
                'prog_niskiego_stanu' => 3,
                'zarezerwowano_ilosc' => 0
            )
        );

        DB::table('magazyn')->insert(
            array(
                'nazwa_czesci' => 'zboirnik',
                'opis' => 'endure',
                'dlugosc' => 6,
                'szerokosc' => 7,
                'wysokosc' => 3,
                'waga' => 4,
                'ilosc' => 3,
                'prog_niskiego_stanu' => 1,
                'zarezerwowano_ilosc' => 0
            )
        );

        DB::table('magazyn')->insert(
            array(
                'nazwa_czesci' => 'tłumik',
                'opis' => 'silence',
                'dlugosc' => 2,
                'szerokosc' => 1,
                'wysokosc' => 2,
                'waga' => 2,
                'ilosc' => 11,
                'prog_niskiego_stanu' => 5,
                'zarezerwowano_ilosc' => 0
            )
        );
        DB::table('magazyn')->insert(
            array(
                array(
                    'nazwa_czesci' => 'Silnik', 'opis' => 'silnik/35we', 'dlugosc' => 2, 'szerokosc' => 2,
                    'wysokosc' => 2, 'waga' => 2500, 'ilosc' => 5, 'prog_niskiego_stanu' => 12,'zarezerwowano_ilosc' => 0
                ),
                array(
                    'nazwa_czesci' => 'Koło 15', 'opis' => 'koło 15/35we', 'dlugosc' => 0.3, 'szerokosc' => 0.7,
                    'wysokosc' => 0.7, 'waga' => 200, 'ilosc' => 90, 'prog_niskiego_stanu' => 120,'zarezerwowano_ilosc' => 0
                ),
                array(
                    'nazwa_czesci' => 'Lampa lewa', 'opis' => 'left lamp', 'dlugosc' => 0.5, 'szerokosc' => 0.3,
                    'wysokosc' => 2, 'waga' => 50, 'ilosc' => 40, 'prog_niskiego_stanu' => 30,'zarezerwowano_ilosc' => 0
                ),
                array(
                    'nazwa_czesci' => 'Lampa prawa', 'opis' => 'right lamp', 'dlugosc' => 0.5, 'szerokosc' => 0.3,
                    'wysokosc' => 2, 'waga' => 50, 'ilosc' => 38, 'prog_niskiego_stanu' => 30,'zarezerwowano_ilosc' => 0
                ),
                array(
                    'nazwa_czesci' => 'Hamulce', 'opis' => 'brakes/35we', 'dlugosc' => 0.5, 'szerokosc' => 0.5,
                    'wysokosc' => 0.5, 'waga' => 100, 'ilosc' => 30, 'prog_niskiego_stanu' => 50,'zarezerwowano_ilosc' => 0
                ),
                array(
                    'nazwa_czesci' => 'Pantograf', 'opis' => 'Pantograf/35we', 'dlugosc' => 5, 'szerokosc' => 3,
                    'wysokosc' => 0.2, 'waga' => 2500, 'ilosc' => 5, 'prog_niskiego_stanu' => 12,'zarezerwowano_ilosc' => 0
                ),
                array(
                    'nazwa_czesci' => 'Fotel', 'opis' => 'seat/35we', 'dlugosc' => 0.5, 'szerokosc' => 0.5,
                    'wysokosc' => 1.5, 'waga' => 2500, 'ilosc' => 5, 'prog_niskiego_stanu' => 12,'zarezerwowano_ilosc' => 0
                )
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('magazyn');
    }
};
