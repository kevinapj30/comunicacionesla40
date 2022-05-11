<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\TipoEquipoController;
use App\Http\Controllers\UsuarioController;
use App\Models\Cliente;
use App\Models\Diagnostico;
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

Route::group(['middleware' => 'auth'], function() {
    
    Route::get('/home', DashboardController::class);

    Route::post('/tipo-de-equipos/actualizar', [TipoEquipoController::class, 'actualizar'])->name('tipo-de-equipos.actualizar');
    Route::resource('/tipo-de-equipos', TipoEquipoController::class)->parameters(['tipo-de-equipos' => 'tipoEquipo']);

    Route::post('/usuarios/actualizar', [UsuarioController::class, 'actualizar'])->name('usuarios.actualizar');
    Route::resource('/usuarios', UsuarioController::class);

    Route::post('/equipos/update', [EquipoController::class, 'actualizar'])->name('equipos.actualizar');
    Route::resource('/equipos',EquipoController::class);

    Route::post('/diagnosticos/update', [DiagnosticoController::class, 'actualizar'])->name('diagnosticos.actualizar');
    Route::resource('/diagnosticos',DiagnosticoController::class);

});
