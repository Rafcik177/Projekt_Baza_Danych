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
            $table->unsignedBigInteger('id_pracownika');
            $table->string('rok');
            $table->integer('dni_wykorzystane');
            $table->integer('dni_max');
            $table->foreign('id_pracownika')->references('id')->on('users')->onDelete('cascade');
        });

        DB::table('urlopy')->insert(
            array(
                'id_pracownika' => '1',
                'rok' => '2022',
                'dni_wykorzystane' => '0',
                'dni_max' => '20',
            )
            );
        
        DB::table('urlopy')->insert(
            array(
                'id_pracownika' => '2',
                'rok' => '2022',
                'dni_wykorzystane' => '0',
                'dni_max' => '26',
            )
            );

        DB::table('urlopy')->insert(
            array(
                'id_pracownika' => '3',
                'rok' => '2022',
                'dni_wykorzystane' => '0',
                'dni_max' => '26',
            )
            );

        DB::table('urlopy')->insert(
            array(
                'id_pracownika' => '4',
                'rok' => '2022',
                'dni_wykorzystane' => '0',
                'dni_max' => '20',
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
