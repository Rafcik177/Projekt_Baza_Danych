<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AutocompleteController;
use App\Http\Controllers\MagazynController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\PracownicyController;
use App\Http\Controllers\Produkcja\ProdukcjaController;
use App\Http\Controllers\SpisyCzesciController;
use App\Http\Controllers\ZamowieniaKlientController;
use App\Http\Controllers\HistoriaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NiskiStan;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\ZamAdminController;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\DzialyController;
use App\Http\Controllers\UrlopyController;

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
Route::get('/oferta', [OfertaController::class, 'index']);
Route::resource('/oferta', OfertaController::class);

//Route::get('autocomplete_nr_zam', [ProdukcjaController::class, 'autocomplete_nr_zam'])->name('autocomplete_nr_zam');
/*Route::get('/autocomplete/nr_zam', function(){
    $col = 'nr_zam';
    return AutocompleteController->$col();
});*/

Auth::routes();

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //route dla systemu autocomplete
    Route::controller(AutocompleteController::class)->group(function () {
        $allowedColNames = ['nr_zam', 'n_model'];
        foreach ($allowedColNames as $col) {
            Route::get('/autocomplete/' . $col, $col);
        }
        //Route::get('/autocomplete/nr_zam', 'nr_zam');
        //Route::get('/autocomplete/n_model', 'n_model');
    });

    Route::middleware(['can:czyAdmin'])->group(function () {
        Route::get('/email', function () {
            Mail::to('tocarra.2@mufollowsa.com')->send(new WelcomeMail());
            return new WelcomeMail();
        });
        Route::get('/zamadmin', [ZamAdminController::class, 'wypisz']);
        Route::resource('zamadmin', ZamAdminController::class);
        Route::get('/admin', [AdminController::class, 'index']);
        Route::resource('admin', AdminController::class);
        Route::get('/modele', [ModeleController::class, 'index']);
        Route::resource('/modele', ModeleController::class);
        Route::resource('/spisyczesci', SpisyCzesciController::class);
    });

    
    Route::middleware(['can:czyKlient','can:czyAdmin'])->group(function () {
        Route::get('/zamowienia', [ZamowieniaKlientController::class, 'index']);
        Route::resource('zamowienia', ZamowieniaKlientController::class);
    });


    Route::middleware(['can:czyHR','can:czyAdmin'])->group(function () {
        Route::get('/urlopy', [UrlopyController::class, 'index']);
        Route::resource('urlopy', UrlopyController::class);
        Route::get('/pracownicy', [PracownicyController::class, 'index']);
        Route::resource('pracownicy', PracownicyController::class);
        Route::get('/historia', [HistoriaController::class, 'index']);
        Route::resource('historia', HistoriaController::class);
        Route::get('/dzialy', [DzialyController::class, 'index']);
        Route::resource('dzialy', DzialyController::class);
    });


    Route::middleware(['can:czyMagazyn','can:czyAdmin'])->group(function () {
        Route::get('/magazyn', [MagazynController::class, 'index']);
        Route::resource('magazyn', MagazynController::class);
        Route::get('/niskistan', [NiskiStan::class, 'wypisz']);
    });


    Route::middleware(['can:czyProdukcja','can:czyAdmin'])->group(function () {
        Route::get('/produkcja', [ProdukcjaController::class, 'index']);
        Route::resource('produkcja', ProdukcjaController::class);
    });
});


//Powiadomienia o stanie + zamówienia admin

//Route::get('/zamadmin',[ZamAdminController::class, 'wypisz']);



//Route::get('/powiadomienia',[NiskiStan::class, 'sendTestNotification']);
