<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\TestStanu;
use DB;


class NiskiStan extends Controller
{
    public function sendTestNotification()
    {
       $user = User::first();

        $enrollmentData = [
            'body'=>'Email testowy ',
            'enrollmentText'=> 'Super',
            'url'=> url('/'),
            'thankyou'=> 'Coś tam coś tam'

        ];

        $user->notify(new TestStanu($enrollmentData));

        
        
    }

    public static function stanczesci()
    {
        $glowne = DB::table('magazyn')->whereRaw('ilosc <= prog_niskiego_stanu')->count();
        return $glowne;
    }

    public function wypisz()
    {
        $niskistan = DB::table('magazyn')->whereRaw('ilosc <= prog_niskiego_stanu')->get();
        return view('magazyn/niskistan', ['niskistan'=>$niskistan]);
    }
}
