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
        Schema::create('zamowienia', function (Blueprint $table) {
            $table->id();
            $table->integer('id_zamawiajacego')->references('id')->on('users');
            $table->integer('id_modelu')->references('id')->on('modele');
            $table->integer('ilosc');
            $table->string('status');
            $table->date('data_zlozenia');
            $table->boolean('realizacja');
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
