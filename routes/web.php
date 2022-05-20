<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MagazynController;
use App\Http\Controllers\PracownicyController;
use App\Http\Controllers\Produkcja\ProdukcjaController;
use App\Http\Controllers\ZamowieniaKlientController;
use App\Http\Controllers\HistoriaController;
use Illuminate\Support\Facades\Auth;

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



//Dla magazynu
Route::get('/magazyn', [MagazynController::class, 'index']);
Route::resource('magazyn', MagazynController::class);

Route::get('/pracownicy', [PracownicyController::class, 'index']);
Route::resource('pracownicy', PracownicyController::class);

Route::get('/php', [ProdukcjaController::class, 'index']);
Route::resource('produkcja', ProdukcjaController::class);
Route::get('/zamowienia', [ZamowieniaKlientController::class, 'index']);
Route::resource('zamowienia', ZamowieniaKlientController::class);

Route::get('/historia', [HistoriaController::class, 'index']);
Route::resource('historia', HistoriaController::class);


Auth::routes();
 //poniższa grupa jest dla wszystkich zalogowanych
Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::middleware(['can:czyKlient'])->group(function(){
        

    });
    //poniższa grupa jest tylko dla tych, którzy są w dziale HR
    Route::middleware(['can:czyHR'])->group(function(){
        Route::get('/szukajpracownika', [App\Http\Controllers\HomeController::class, 'szukajpracownika']);
        Route::post('/pracownik', [App\Http\Controllers\HomeController::class, 'pracownik'])->name('pracownik');

    //Route::middleware(['can:czyHR'])->group(function(){
        //Route::get('/pracownicy', [PracownicyController::class, 'index']);
        //Route::resource('pracownicy', PracownicyController::class);

    //Route::middleware(['can:czyMAGAZYN'])->group(function(){
        //Route::get('/magazyn', [MagazynController::class, 'index']);
        //Route::resource('magazyn', MagazynController::class);

    });
    
});


