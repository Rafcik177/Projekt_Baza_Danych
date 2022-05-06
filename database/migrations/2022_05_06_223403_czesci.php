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
        Schema::create('czesci', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa_czesci')->references('nazwa_czesci')->on('magazyn');
            $table->integer('id_modelu')->references('id')->on('modele');
            $table->string('ilosc_do_wykonania');
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
