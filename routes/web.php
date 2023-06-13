<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuscriptorController;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

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
Route::get('pendientes', 'DetalleFacturaControlador@pendientes')->name('pendientes.index');


Route::resource('detalles', 'FacturaController')->except('show');
Route::get('/detalles/{id}', 'FacturaController@show')->name('facturas.show');
Route::get('/imprimir', 'FacturaController@imprimirPdf');
Route::resource('creditos', 'CreditosController')->except('creditos');
Route::get('creditos/{id}', 'CreditosController@show')->name('creditos.show');

Route::resource('pagos', 'PagosController')->except('pagos');
Route::get('suscriptores/export', 'SuscriptorController@export')->name('suscriptores.export');
Route::get('/suscriptores/exportar', [SuscriptorController::class, 'export'])->name('suscriptores.export');

//FACTURACIÓN
Route::get('/facturacion/recibo', 'FacturacionController@recibo')->name('facturacion.recibo');
Route::resource('facturacion', 'FacturacionController')->except('facturacion');
Route::get('/facturacion/crear', [FacturacionController::class, 'create'])->name('facturacion.create');
Route::get('/facturacion/pdf/{matricula}', 'FacturacionController@pdf')->name('facturacion.pdf');

//FACTURAS
Route::get('/facturas/ticket/{matricula}', 'FacturacionController@ticket')->name('facturas.ticket');
Route::get('/facturas/imp/{matricula}', 'FacturacionController@imp')->name('facturas.imp');
//Route::get('/facturas/{id}/imprimir', 'FacturaController@imprimirPdf');
Route::get('/facturas/imprimir/{id}', 'FacturaController@imprimirPdf')->name('facturas.imprimir');
//Route::get('facturas/pdf/{id}', [FacturaController::class, 'pdf'])->name('facturas.pdf');


//RESPALDO
//Route::get('/backup/download', 'BackupController@download')->name('backup.download');
//Route::get('/backup', '\Spatie\Backup\BackupController@index')->middleware('auth');
//Route::get('/backup', '\Spatie\Backup\BackupController@index');
//Route::get('/backup', 'BackupController@backup')->name('backup');

//DESCARGA EXCEL
//Route::get('/facturacion/export', [FacturacionController::class, 'export'])->name('facturacion.export');


});