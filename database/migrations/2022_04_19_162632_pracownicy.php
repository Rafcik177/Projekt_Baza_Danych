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
            $table->integer('ranga');
            $table->string('imie');
            $table->string('nazwisko');
            $table->string('pesel');
            $table->date('data_urodzenia');
            $table->string('stanowisko');
            $table->integer('czy_kierownik');
            $table->integer('id_wydzialu')->references('id')->on('dzialy');
        });
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
