<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuscriptorController;


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
Route::resource('suscriptores', 'SuscriptorController');

 Route::namespace('App\Http\Controllers')->group(function () {
    Route::prefix('')->group(function () {
        Route::resource('suscriptores', 'SuscriptorController');
    });
});

Route::resource('lecturas', 'LecturaController');

 Route::namespace('App\Http\Controllers')->group(function () {
    Route::prefix('')->group(function () {
        Route::resource('lecturas', 'LecturaController');
    });
});

Route::resource('matriculas', 'MatriculaController');

 Route::namespace('App\Http\Controllers')->group(function () {
    Route::prefix('')->group(function () {
        Route::resource('matriculas', 'MatriculaController');
    });
});

Route::resource('tarifas', 'TarifaController');
 Route::namespace('App\Http\Controllers')->group(function () {
    Route::prefix('')->group(function () {
        Route::resource('tarifas', 'TarifaController');
    });
});

 Route::get('/detallelectura', 'DetalleLecturaController@index')->name('detallelectura.index');



Route::resource('detallelectura', 'DetalleLecturaController');
 Route::namespace('App\Http\Controllers')->group(function () {
    Route::prefix('')->group(function () {
        Route::resource('detallelectura', 'DetalleLecturaController');
    });
});


Route::resource('detallefactura', 'DetalleFacturaControlador');
 Route::namespace('App\Http\Controllers')->group(function () {
    Route::prefix('')->group(function () {
        Route::resource('detallefactura', 'DetalleFacturaControlador');
    });
});