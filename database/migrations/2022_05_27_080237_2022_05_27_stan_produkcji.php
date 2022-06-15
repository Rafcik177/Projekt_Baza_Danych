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
            $table->unsignedBigInteger('id_zamowienia');
            $table->unsignedBigInteger('id_modelu');
            $table->integer('ilosc_obecna')->default(0);
            $table->integer('ilosc_docelowa');
            $table->foreign('id_zamowienia')->references('id')->on('zamowienia')->onDelete('cascade');
            $table->foreign('id_modelu')->references('id')->on('modele')->onDelete('cascade');
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
