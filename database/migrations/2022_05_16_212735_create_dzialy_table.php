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
        Schema::create('dzialy', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa');
        });

        DB::table('dzialy')->insert(
            array(
                'nazwa' => 'Dział administracji',
            )
            );

        DB::table('dzialy')->insert(
            array(
                'nazwa' => 'Dział zamówień',
            )
            );

        DB::table('dzialy')->insert(
            array(
                'nazwa' => 'Dział HR',
            )
            );

        DB::table('dzialy')->insert(
            array(
                'nazwa' => 'Dział produkcji',
            )
            );

        DB::table('dzialy')->insert(
            array(
                'nazwa' => 'Magazyn',
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
