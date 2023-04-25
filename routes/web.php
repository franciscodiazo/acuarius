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
Route::namespace('App\Http\Controllers')->group(function () {
Route::resource('suscriptores', 'SuscriptorController');
Route::resource('lecturas', 'LecturaController');
//Route::get('lecturas/{lectura}', 'LecturasController@show')->name('lecturas.show');
//Route::get('/lecturas/{lectura}', [LecturasController::class, 'show'])->name('lecturas.show');
Route::resource('matriculas', 'MatriculaController');
Route::resource('tarifas', 'TarifaController');
Route::resource('detallelectura', 'DetalleLecturaController');
Route::resource('detallefactura', 'DetalleFacturaControlador');
Route::resource('detalles', 'FacturaController')->except('show');
Route::get('/detalles/{id}', 'FacturaController@show')->name('facturas.show');
//Route::get('facturas/pdf/{id}', [FacturaController::class, 'pdf'])->name('facturas.pdf');
Route::get('/imprimir', 'FacturaController@imprimirPdf');
//Route::get('/facturas/{id}/imprimir', 'FacturaController@imprimirPdf');
Route::get('/facturas/imprimir/{id}', 'FacturaController@imprimirPdf')->name('facturas.imprimir');
Route::resource('creditos', 'CreditosController')->except('creditos');
Route::get('creditos/{id}', 'CreditosController@show')->name('creditos.show');

Route::resource('pagos', 'PagosController')->except('pagos');
Route::get('suscriptores/export', 'SuscriptorController@export')->name('suscriptores.export');
Route::get('/suscriptores/exportar', [SuscriptorController::class, 'export'])->name('suscriptores.export');
/*
Route::get('/backup', 'BackupController@index')->name('backup.index');
Route::post('/backup/create', 'BackupController@create')->name('backup.create');
Route::get('/backup/download', 'BackupController@download')->name('backup.download');
*/


});