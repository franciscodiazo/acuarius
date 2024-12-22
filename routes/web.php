<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LecturaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TarifaController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\HomeController;



// Ruta de bienvenida
Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');


// Mostrar formulario de registro de lectura
Route::get('/lecturas/create', [LecturaController::class, 'create'])->name('lecturas.create');
Route::get('/lecturas/edit/{id}', [LecturaController::class, 'edit'])->name('lecturas.edit');
Route::resource('lecturas', LecturaController::class);
Route::post('/lecturas', [LecturaController::class, 'store'])->name('lecturas.store');
Route::get('/lecturas', [LecturaController::class, 'index'])->name('lecturas.index');
Route::get('/lecturas/ultima/{matricula}', [LecturaController::class, 'obtenerUltimaLectura'])->name('lecturas.ultima');

Route::get('/lecturas/create', [LecturaController::class, 'create'])->name('lecturas.create');
Route::get('/lecturas/edit/{id}', [LecturaController::class, 'edit'])->name('lecturas.edit');
Route::get('/lecturas/ultima/{matricula}', [LecturaController::class, 'obtenerUltimaLectura'])->name('lecturas.ultima');
Route::resource('lecturas', LecturaController::class)->except(['create', 'edit']);

// Rutas para clientes
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{id}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('clientes.update');

// Rutas para tarifas
Route::get('/tarifas', [TarifaController::class, 'index'])->name('tarifas.index');
Route::get('/tarifas/create', [TarifaController::class, 'create'])->name('tarifas.create');
Route::post('/tarifas', [TarifaController::class, 'store'])->name('tarifas.store');
Route::get('/tarifas/{id}/edit', [TarifaController::class, 'edit'])->name('tarifas.edit');
Route::put('/tarifas/{id}', [TarifaController::class, 'update'])->name('tarifas.update');
Route::delete('/tarifas/{id}', [TarifaController::class, 'destroy'])->name('tarifas.destroy');

//Rutas para facturas
Route::resource('facturas', FacturaController::class);
Route::get('/facturas', [FacturaController::class, 'index'])->name('facturas.index');
Route::get('/facturas/create', [FacturaController::class, 'create'])->name('facturas.create');
Route::post('/facturas', [FacturaController::class, 'store'])->name('facturas.store');
Route::get('/facturas/{id}/edit', [FacturaController::class, 'edit'])->name('facturas.edit');

Route::post('/facturas/create-from-lectura/{lectura}', [FacturaController::class, 'createFromLectura'])->name('facturas.create.from.lectura');
Route::post('/facturas/pagar', [FacturaController::class, 'pagar'])->name('facturas.pagar');
Route::get('/facturas/historico/{cliente_id}', [FacturaController::class, 'historico'])->name('facturas.historico');
Route::get('/clientes/{id}/facturas', [FacturaController::class, 'showFacturasCliente'])->name('clientes.facturas');
Route::resource('facturas', FacturaController::class);
