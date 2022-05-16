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
        Schema::create('pracownicy', function (Blueprint $table) {
            $table->id();
            $table->string('imie');
            $table->string('nazwisko');
            $table->string('pesel', 11);
            $table->date('data_urodzenia');
            $table->string('stanowisko');
            $table->boolean('czy_kierownik');
            $table->float('wynagrodzenie_miesieczne');
            $table->integer('id_wydzialu')->references('id')->on('dzialy');
        });


        DB::table('pracownicy')->insert(
            array(
                'imie' => 'Jan',
                'nazwisko' => 'Kowalski',
                'pesel' => '91030467389',
                'data_urodzenia' => '1991-03-04',
                'stanowisko' => 'magazynier',
                'czy_kierownik' => 0,
                'wynagrodzenie_miesieczne' => 3700.00,
                'id_wydzialu' => 2,
            )
            );

        DB::table('pracownicy')->insert(
            array(
                'imie' => 'Jakub',
                'nazwisko' => 'Nowak',
                'pesel' => '94120592132',
                'data_urodzenia' => '1994-12-05',
                'stanowisko' => 'magazynier',
                'czy_kierownik' => 1,
                'wynagrodzenie_miesieczne' => 13500.00,
                'id_wydzialu' => 2,
            )
            );

        DB::table('pracownicy')->insert(
            array(
                'imie' => 'Andrzej',
                'nazwisko' => 'Morski',
                'pesel' => '66112267481',
                'data_urodzenia' => '1966-11-22',
                'stanowisko' => 'księgowy',
                'czy_kierownik' => 0,
                'wynagrodzenie_miesieczne' => 4500.00,
                'id_wydzialu' => 4,
            )
            );

        DB::table('pracownicy')->insert(
            array(
                'imie' => 'Konrad',
                'nazwisko' => 'Wolski',
                'pesel' => '88010227593',
                'data_urodzenia' => '1988-01-02',
                'stanowisko' => 'rekruter',
                'czy_kierownik' => 0,
                'wynagrodzenie_miesieczne' => 5200.00,
                'id_wydzialu' => 4,
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
        Schema::dropIfExists('pracownicy');
    }
};
