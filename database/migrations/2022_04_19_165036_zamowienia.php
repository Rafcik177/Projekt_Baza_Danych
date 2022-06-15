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
            $table->unsignedBigInteger('id_zamawiajacego');
            $table->string('id_zamowienia')->nullable();
            $table->unsignedBigInteger('id_modelu');
            $table->string('nazwa_modelu')->nullable();
            $table->integer('ilosc')->nullable();
            $table->enum('status', ["Złożono", "Anulowano-klient","Anulowano-NZTK", "Produkcja", "Gotowe", "Usunięto"])->nullable();
            $table->datetime('data_zlozenia')->nullable();
            $table->boolean('realizacja')->nullable();
            $table->string('cena_pojedyncza')->nullable();
            $table->string('odnosnie_id_zamowienia')->nullable();
            $table->foreign('id_zamawiajacego')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_modelu')->references('id')->on('modele')->nullable()->onDelete('cascade');
            $table->integer('staty')->references('id')->on('statusy')->nullable();
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
