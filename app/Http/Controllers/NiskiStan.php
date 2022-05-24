<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\TestStanu;

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
}
