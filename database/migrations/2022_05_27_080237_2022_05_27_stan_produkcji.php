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
        Schema::create('stanprodukcji', function (Blueprint $table) {
            $table->id();
            $table->integer('id_zamowienia')->references('id')->on('zamowienia');
            $table->integer('id_modelu')->references('id')->on('modele');
            $table->integer('ilosc_obecna')->default(0);
            $table->integer('ilosc_docelowa');
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
