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
//poniższa grupa jest dla wszystkich zalogowanych
Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //poniższa grupa jest tylko dla tych, którzy są w dziale HR
    Route::middleware(['can:czyHR'])->group(function(){
        Route::get('/szukajpracownika', [App\Http\Controllers\HomeController::class, 'szukajpracownika'])->name('szukajpracownika');
        Route::post('/pracownik', [App\Http\Controllers\HomeController::class, 'pracownik'])->name('pracownik');

    });
    
});


