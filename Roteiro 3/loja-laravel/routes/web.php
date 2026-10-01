<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('produtos.index');
});
Route::get('/produtos', [ProdutoController::class, 'index'])
    ->name('produtos.index');
Route::get('/produtos/criar', [ProdutoController::class, 'create'])
    ->name('produtos.create');
Route::post('/produtos', [ProdutoController::class, 'store'])
    ->name('produtos.store');
Route::get('/produtos/{produto}', [ProdutoController::class, 'show'])
    ->name('produtos.show');
Route::delete('/produtos/{produto}', [ProdutoController::class, 'destroy'])
    ->name('produtos.destroy');
