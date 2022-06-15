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
        Schema::create('statusy', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa');
        });

        DB::table('statusy')->insert(
            array(
                'nazwa' => 'Złożono',
            )
            );

        DB::table('statusy')->insert(
            array(
                'nazwa' => 'Anulowano klient',
            )
            );

        DB::table('statusy')->insert(
            array(
                'nazwa' => 'Anulowano NZTK',
            )
            );

        DB::table('statusy')->insert(
            array(
                'nazwa' => 'Produkcja',
            )
            );

        DB::table('statusy')->insert(
            array(
                'nazwa' => 'Gotowe',
            )
            );

        DB::table('statusy')->insert(
            array(
                'nazwa' => 'Usunięto',
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
