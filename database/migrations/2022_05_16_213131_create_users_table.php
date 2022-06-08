<?php

use App\RoleNZTK;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('imie');
            $table->string('nazwisko');
            $table->string('firma')->nullable();
            $table->string('adres')->nullable();
            $table->string('pesel', 11)->nullable();
            $table->date('data_urodzenia')->nullable();
            $table->string('stanowisko')->nullable();
            $table->boolean('czy_kierownik')->nullable();
            $table->float('wynagrodzenie_miesieczne')->nullable();
            $table->integer('id_wydzialu')->references('id')->on('dzialy')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->default(Hash::make('12345'));
            $table->rememberToken();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->enum('role', allowed: RoleNZTK::TYPES)->default(RoleNZTK::KLIENT);
            $table->integer('lata_pracy')->nullable();
            $table->integer('wykorzystany_urlop')->nullable();
            $table->boolean('czy_zwolniony')->nullable();
        });

        DB::table('users')->insert(
            array(
                'imie' => 'Jan',
                'nazwisko' => 'Kowalski',
                'pesel' => '91030467389',
                'data_urodzenia' => '1991-03-04',
                'stanowisko' => 'Magazynier',
                'czy_kierownik' => 0,
                'wynagrodzenie_miesieczne' => 3700.00,
                'id_wydzialu' => 5,
                'email' => "jankowalski@gmail.com",
                'password' => Hash::make('12345'),
                'role' =>'dzial_magazyn',
                'lata_pracy' => 9,
                'wykorzystany_urlop' => 5,
                'czy_zwolniony' => 0 
            )
            );

        DB::table('users')->insert(
            array(
                'imie' => 'Jakub',
                'nazwisko' => 'Nowak',
                'pesel' => '94120592132',
                'data_urodzenia' => '1994-12-05',
                'stanowisko' => 'Kierownik',
                'czy_kierownik' => 1,
                'wynagrodzenie_miesieczne' => 13500.00,
                'id_wydzialu' => 5,
                'email' => "jakubnowak@gmail.com",
                'password' => Hash::make('12345'),
                'role'=>'dzial_magazyn',
                'lata_pracy' => 11,
                'wykorzystany_urlop' => 16,
                'czy_zwolniony' => 0 
            )
            );

        DB::table('users')->insert(
            array(
                'imie' => 'Andrzej',
                'nazwisko' => 'Morski',
                'pesel' => '66112267481',
                'data_urodzenia' => '1966-11-22',
                'stanowisko' => 'Robotnik',
                'czy_kierownik' => 0,
                'wynagrodzenie_miesieczne' => 4500.00,
                'id_wydzialu' => 4,
                'email' => "andrzejmorski@gmail.com",
                'password' => Hash::make('12345'),
                'role'=>'dzial_produkcji',
                'lata_pracy' => 14,
                'wykorzystany_urlop' => 7,
                'czy_zwolniony' => 0 
            )
            );

        DB::table('users')->insert(
            array(
                'imie' => 'Konrad',
                'nazwisko' => 'Wolski',
                'pesel' => '88010227593',
                'data_urodzenia' => '1988-01-02',
                'stanowisko' => 'Rekruter',
                'czy_kierownik' => 0,
                'wynagrodzenie_miesieczne' => 5200.00,
                'id_wydzialu' => 3,
                'email' => "konradwolski@gmail.com",
                'password' => Hash::make('12345'),
                'role'=>'dzial_hr',
                'lata_pracy' => 9,
                'wykorzystany_urlop' => 0,
                'czy_zwolniony' => 0
            )
            );
            DB::table('users')->insert(
                array(
                    'imie' => 'Rafał',
                    'nazwisko' => 'Michalik',
                    'pesel' => '91030467389',
                    'data_urodzenia' => '1991-03-04',
                    'stanowisko' => null,
                    'czy_kierownik' => 0,
                    'wynagrodzenie_miesieczne' => NULL,
                    'id_wydzialu' => NULL,
                    'email' => "rafcik1771@gmail.com",
                    'password' => Hash::make('12345'),
                    'role'=>'klient',
                    'lata_pracy' => NULL,
                    'czy_zwolniony' => NULL
                )
                );
                DB::table('users')->insert(
                    array(
                        'imie' => 'Nicolas',
                        'nazwisko' => 'Świątnik',
                        'pesel' => '99041706547',
                        'data_urodzenia' => '1990-12-12',
                        'stanowisko' => null,
                        'czy_kierownik' => 0,
                        'wynagrodzenie_miesieczne' => NULL,
                        'id_wydzialu' => NULL,
                        'email' => "niko9521@gmail.com",
                        'password' => Hash::make('12345'),
                        'role'=>'dzial_produkcji',
                        'lata_pracy' => NULL,
                        'czy_zwolniony' => NULL
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
        Schema::dropIfExists('users');
    }
};
