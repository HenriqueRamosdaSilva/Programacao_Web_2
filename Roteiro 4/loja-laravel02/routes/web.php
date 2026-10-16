<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;

// Adicione esta linha junto das outras rotas
// Redireciona a página inicial para a lista de produtos
Route::get('/', function () {
    return redirect()->route('produtos.index');
});

// Esta única linha cria TODAS as 7 rotas do CRUD (index, create, store, show, edit, update, destroy)
Route::resource('produtos', ProdutoController::class);
Route::resource('cursos', CursoController::class);
