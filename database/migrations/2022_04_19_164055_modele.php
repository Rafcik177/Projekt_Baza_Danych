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
        Schema::create('modele', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa');
            $table->string('kategoria');
            $table->integer('moc');
            $table->integer('ilosc_miejsc')->NULL;
            $table->integer('max_predkosc')->NULL;
            $table->integer('waga');
            $table->integer('cena');
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
