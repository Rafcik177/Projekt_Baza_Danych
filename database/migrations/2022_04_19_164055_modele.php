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
            $table->enum('kategoria', ["Lokomotywa elektryczna","Lokomotywa spalinowa", "Wagon pasażerski", "Wagon towarowy","Elektryczny Zespół Trakcyjny","Spalinowy Zespół Trakcyjny","Hybrydowy Zespół Trakcyjny"])->utf8_encode;
            $table->integer('moc');
            $table->integer('ilosc_miejsc')->NULL;
            $table->integer('max_predkosc')->NULL;
            $table->integer('waga');
            $table->string('cena', 20);
            $table->boolean('czy_ukonczona')->default(false);
            $table->text('opis')->nullable();
        });
        DB::table('modele')->insert(
            array(
                'nazwa' => '35WE',
                'kategoria' => 'Elektryczny Zespół Trakcyjny',
                'moc' => 400,
                'ilosc_miejsc' => 308,
                'max_predkosc' => 160,
                'waga' => 130,
                'cena' => 25980000,
                'czy_ukonczona' => false
            )
            );
            DB::table('modele')->insert(
            array(
                'nazwa' => '45WE',
                'kategoria' => 'Elektryczny Zespół Trakcyjny',
                'moc' => 480,
                'ilosc_miejsc' => 4,
                'max_predkosc' => 190,
                'waga' => 160,
                'cena' => 31580000,
                'czy_ukonczona' => false
            )
            );
            DB::table('modele')->insert(
            array(
                'nazwa' => '168A',
                'kategoria' => 'Wagon Pasażerski',
                'moc' => 0,
                'ilosc_miejsc' => 56,
                'max_predkosc' => 160,
                'waga' => 38,
                'cena' => 500000,
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
