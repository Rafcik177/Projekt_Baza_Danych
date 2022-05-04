<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//żeby mieć id usera wystarczy Auth::user()->id; lub po prostu Auth::id();
//Tak samo możesz mieć rangę Auth::user()->ranga;
Route::get('/szukajpracownika', [App\Http\Controllers\HomeController::class, 'szukajpracownika'])->name('szukajpracownika');
Route::post('/pracownik', [App\Http\Controllers\HomeController::class, 'pracownik'])->name('pracownik');