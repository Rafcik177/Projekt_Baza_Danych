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
            $table->integer('id_pracownika')->references('id')->on('users');
            $table->date('data_start');
            $table->date('data_koniec')->nullable();
            $table->string('wydzial');
            $table->string('stanowisko');
        });

        $datas =\DB::table('users')->latest()->get();
        foreach($datas as $data){
            DB::table('historia')
                ->insert([
                'id_pracownika' => $data->id,
                'data_start'=>$data->created_at,
                'data_koniec'=>$data->updated_at,  
                'wydzial'=>$data->id_wydzialu, 
                'stanowisko'=>$data->stanowisko, 
            ]);
        }

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
