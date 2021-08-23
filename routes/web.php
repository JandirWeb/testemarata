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

use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']);

Route::get('/produtos/create', [EventController::class, 'createProduto'])->middleware('auth');
Route::post('/produtos',[EventController::class, 'storeProduto']);
Route::delete('/produtos/{id}', [EventController::class, 'destroyProduto'])->middleware('auth');
Route::get('/produtos/list', [EventController::class, 'listProdutos'])->middleware('auth');
Route::get('/produtos/edit/{id}', [EventController::class, 'editProduto'])->middleware('auth');
Route::put('/produtos/update/{id}', [EventController::class, 'updateProduto'])->middleware('auth');

Route::get('/clientes/create', [EventController::class, 'createCliente'])->middleware('auth');
Route::post('/clientes',[EventController::class, 'storeCliente']);
Route::delete('/clientes/{id}', [EventController::class, 'destroyCliente'])->middleware('auth');
Route::get('/clientes/list', [EventController::class, 'listClientes'])->middleware('auth');
Route::get('/clientes/cliente{id}', [EventController::class, 'showCliente'])->middleware('auth');
Route::get('/clientes/edit/{id}', [EventController::class, 'editCliente'])->middleware('auth');
Route::put('/clientes/update/{id}', [EventController::class, 'updateCliente'])->middleware('auth');

Route::get('/pedidos/create', [EventController::class, 'createPedido'])->middleware('auth');
Route::get('/pedidos/list', [EventController::class, 'listPedidos'])->middleware('auth');
Route::get('/pedidos/{id}', [EventController::class, 'realisePedido'])->middleware('auth');
Route::post('/pedidos/create',[EventController::class, 'storePedido']);
Route::delete('/pedidos/delete/{id}', [EventController::class, 'destroyPedido'])->middleware('auth');
Route::get('/pedidos/list/{id}', [EventController::class, 'showPedido'])->middleware('auth');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
