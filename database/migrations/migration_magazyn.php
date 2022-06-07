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
            $table->integer('id_czesci')->references('id')->on('czesci');
            $table->string('opis');
            $table->float('dlugosc');
            $table->float('szerokosc');
            $table->float('wysokosc');
            $table->float('waga');
            $table->integer('ilosc');
            $table->integer('prog_niskiego_stanu');
            $table->integer('zarezerwowano_ilosc')->nullable();
        });


        DB::table('magazyn')->insert(
            array(
                array(
                    'id_czesci' => '1', 'opis' => 'silnik/35we', 'dlugosc' => 2, 'szerokosc' => 2,
                    'wysokosc' => 2, 'waga' => 2500, 'ilosc' => 20, 'prog_niskiego_stanu' => 12,'zarezerwowano_ilosc' => 0
                ),
                array(
                    'id_czesci' => '2', 'opis' => 'koło 15/35we', 'dlugosc' => 0.3, 'szerokosc' => 0.7,
                    'wysokosc' => 0.7, 'waga' => 200, 'ilosc' => 160, 'prog_niskiego_stanu' => 120,'zarezerwowano_ilosc' => 0
                ),
                array(
                    'id_czesci' => '3', 'opis' => 'left lamp', 'dlugosc' => 0.5, 'szerokosc' => 0.3,
                    'wysokosc' => 2, 'waga' => 50, 'ilosc' => 40, 'prog_niskiego_stanu' => 30,'zarezerwowano_ilosc' => 0
                ),
                array(
                    'id_czesci' => '4', 'opis' => 'right lamp', 'dlugosc' => 0.5, 'szerokosc' => 0.3,
                    'wysokosc' => 2, 'waga' => 50, 'ilosc' => 38, 'prog_niskiego_stanu' => 30,'zarezerwowano_ilosc' => 0
                ),
                array(
                    'id_czesci' => '5', 'opis' => 'brakes/35we', 'dlugosc' => 0.5, 'szerokosc' => 0.5,
                    'wysokosc' => 0.5, 'waga' => 100, 'ilosc' => 140, 'prog_niskiego_stanu' => 50,'zarezerwowano_ilosc' => 0
                ),
                array(
                    'id_czesci' => '6', 'opis' => 'Pantograf/35we', 'dlugosc' => 5, 'szerokosc' => 3,
                    'wysokosc' => 0.2, 'waga' => 2500, 'ilosc' => 12, 'prog_niskiego_stanu' => 12,'zarezerwowano_ilosc' => 0
                ),
                array(
                    'id_czesci' => '7', 'opis' => 'seat/35we', 'dlugosc' => 0.5, 'szerokosc' => 0.5,
                    'wysokosc' => 1.5, 'waga' => 2500, 'ilosc' => 1200, 'prog_niskiego_stanu' => 12,'zarezerwowano_ilosc' => 0
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
