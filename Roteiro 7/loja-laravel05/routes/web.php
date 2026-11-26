<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return redirect()->route('produtos.index');
});

Route::resource('produtos', ProdutoController::class);
Route::resource('cursos', CursoController::class);
Route::get('/pedidos', [PedidoController::class, 'index'])
    ->name('pedidos.index');
Route::get('/pedidos/criar', [PedidoController::class, 'create'])
    ->name('pedidos.create');
Route::post('/pedidos', [PedidoController::class, 'store'])
    ->name('pedidos.store');
Route::get('/clientes/{cliente}/pedidos', [ClienteController::class, 'pedidos'])->name('clientes.pedidos');
Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');