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
