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
        Schema::create('zamowienia', function (Blueprint $table) {
            $table->id();
            $table->integer('id_zamawiajacego')->references('id')->on('users');
            $table->string('id_zamowienia')->nullable();
            $table->integer('id_modelu')->references('id')->on('modele')->nullable();
            $table->integer('ilosc')->nullable();
            $table->string('status')->default(NULL);
            $table->datetime('data_zlozenia');
            $table->boolean('realizacja')->nullable();
            $table->string('cena')->nullable();
            $table->string('odnosnie_id_zamowienia')->nullable();
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
