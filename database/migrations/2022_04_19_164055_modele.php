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
        Schema::create('modele', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa');
            $table->enum('kategoria', ['Lokomotywa', 'Wagon pasażerski', 'Wagon towarowy']);
            $table->integer('moc');
            $table->integer('ilosc_miejsc')->NULL;
            $table->integer('max_predkosc')->NULL;
            $table->integer('waga');
            $table->string('cena', 20);
        });
        DB::table('modele')->insert(
            array(
                'nazwa' => '35WE',
                'kategoria' => 'Lokomotywa',
                'moc' => 400,
                'ilosc_miejsc' => 4,
                'max_predkosc' => 160,
                'waga' => 130,
                'cena' => 25980000,
            )
            );
            DB::table('modele')->insert(
            array(
                'nazwa' => '45WE',
                'kategoria' => 'Lokomotywa',
                'moc' => 480,
                'ilosc_miejsc' => 4,
                'max_predkosc' => 190,
                'waga' => 160,
                'cena' => 31580000,
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
        //
    }
};
