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
        Schema::create('czesci', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa_czesci')->references('nazwa_czesci')->on('magazyn');
            $table->integer('id_modelu')->references('id')->on('modele');
            $table->string('ilosc_do_wykonania');
        });

        //Theoretical insertions

        DB::table('czesci')->insert(
            array(
                array('nazwa_czesci' => 'Silnik', 'id_modelu' => 1, 'ilosc_do_wykonania' => 4),
                array('nazwa_czesci' => 'Koło 15', 'id_modelu' => 1, 'ilosc_do_wykonania' => 40),
                array('nazwa_czesci' => 'Lampa lewa', 'id_modelu' => 1, 'ilosc_do_wykonania' => 2),
                array('nazwa_czesci' => 'Lampa prawa', 'id_modelu' => 1, 'ilosc_do_wykonania' => 2),
                array('nazwa_czesci' => 'Hamulce', 'id_modelu' => 1, 'ilosc_do_wykonania' => 40),
                array('nazwa_czesci' => 'Pantograf', 'id_modelu' => 1, 'ilosc_do_wykonania' => 2),
                array('nazwa_czesci' => 'Fotel', 'id_modelu' => 1, 'ilosc_do_wykonania' => 308),
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
