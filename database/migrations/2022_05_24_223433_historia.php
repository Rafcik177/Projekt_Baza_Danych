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
        Schema::create('historia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pracownika');
            $table->date('data_start');
            $table->date('data_koniec')->nullable();
            $table->integer('wydzial');
            $table->string('stanowisko');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->foreign('id_pracownika')->references('id')->on('users')->onDelete('cascade');
        });


        DB::table('historia')->insert(
            array(
                'id_pracownika' => 1,
                'data_start' => '2021-11-23',
                'wydzial' => 5,
                'stanowisko' => 'magazynier'
                )
                );

        DB::table('historia')->insert(
            array(
                'id_pracownika' => 2,
                'data_start' => '2021-07-13',
                'wydzial' => 5,
                'stanowisko' => 'Kierownik'
                )
                );

        DB::table('historia')->insert(
            array(
                'id_pracownika' => 3,
                'data_start' => '2019-07-13',
                'wydzial' => 4,
                'stanowisko' => 'robotnik'
                )
                );

        DB::table('historia')->insert(
            array(
                'id_pracownika' => 4,
                'data_start' => '2015-09-16',
                'wydzial' => 3,
                'stanowisko' => 'rekruter'
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
