<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->integer('dlugosc');
            $table->integer('szerokosc');
            $table->integer('wysokosc');
            $table->integer('waga');
            $table->integer('ilosc');
            $table->integer('prog_niskiego_stanu');
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
