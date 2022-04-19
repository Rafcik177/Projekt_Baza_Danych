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
            $table->string('nazwa_czesci')->id();
            $table->string('opis');
            $table->integer('dlugosc');
            $table->integer('szerokosc');
            $table->integer('wysokosc');
            $table->integer('waga');
            $table->integer('dostepna_ilosc');
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
