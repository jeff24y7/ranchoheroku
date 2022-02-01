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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('/medicamento', 'App\Http\Controllers\MedicamentoController');
Route::resource('/personas','App\Http\Controllers\PersonasController');
Route::resource('/nacimientos','App\Http\Controllers\NacimientosController');
Route::resource('/nacimientos_esperma','App\Http\Controllers\NacimientosEspermaController');
Route::resource('/compra_medicamento', 'App\Http\Controllers\CompraMedicamentoController');
Route::resource('/reportes','App\Http\Controllers\ReportesController');
Route::resource('/compras','App\Http\Controllers\CompraGController');
Route::resource('/esperma','App\Http\Controllers\espermaController');
Route::resource('/embrion','App\Http\Controllers\EmbrionController');
Route::resource('/produccion_leche','App\Http\Controllers\ProduccionLeche_controller');
Route::resource('/ganado','App\Http\Controllers\GanadoGeneralController');
Route::resource('/ventas','App\Http\Controllers\VentasController');
Route::resource('/insertarventa','App\Http\Controllers\Insertarventacontroller');
Route::resource('/usuarios','App\Http\Controllers\LoginController');
Route::resource('/transembriones','App\Http\Controllers\TranferenciaEmbrionesController');
Route::resource('/transesperma','App\Http\Controllers\TransEspermaController');
Route::resource('/vacas-sincronizadas','App\Http\Controllers\TranferenciaEmbrionesController');
Route::resource('/orden_trabajo','App\Http\Controllers\OrdenTrabajoController');
Route::resource('/vaca_prenada','App\Http\Controllers\VacasPrenadasController');
Route::resource('/prenadas_esperma','App\Http\Controllers\PrenadasEspermaController');
Route::resource('/transmonta','App\Http\Controllers\TransMontaController');
Route::resource('/prenadasmonta','App\Http\Controllers\PrenadaMontaController');
