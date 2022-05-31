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
        Schema::create('urlopy', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pracownika')->references('id')->on('users');
            $table->string('rok');
            $table->integer('dni_wykorzystane');
            $table->integer('dni_max');
        });

        DB::table('urlopy')->insert(
            array(
                'id_pracownika' => '2',
                'rok' => '2022',
                'dni_wykorzystane' => '21',
                'dni_max' => '25',
            )
            );
        
        DB::table('urlopy')->insert(
            array(
                'id_pracownika' => '1',
                'rok' => '2022',
                'dni_wykorzystane' => '7',
                'dni_max' => '25',
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
