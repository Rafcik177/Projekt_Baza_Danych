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
            $table->integer('id_modelu')->references('id')->on('modele');
            $table->integer('ilosc');
            $table->string('status');
            $table->date('data_zlozenia');
            $table->boolean('realizacja');
            $table->string('cena');
            $table->integer('id_zamowienia');
        });

        DB::table('zamowienia')->insert(
            array(
                'id_zamawiajacego' => '1',
                'id_modelu' => '1',
                'ilosc' => 1,
                'status' => "Przyjęto",
                'data_zlozenia' => now(),
                'realizacja' => 1,
                'cena' => 25980000,
                'id_zamowienia'=>1
            )
            );
            DB::table('zamowienia')->insert(
                array(
                    'id_zamawiajacego' => '1',
                    'id_modelu' => '2',
                    'ilosc' => 2,
                    'status' => "Odrzucono",
                    'data_zlozenia' => now(),
                    'realizacja' => 0,
                    'cena' => 11233000,
                    'id_zamowienia'=>1
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
