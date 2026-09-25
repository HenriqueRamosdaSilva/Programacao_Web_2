<?php

use App\Http\Controllers\AlunoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('alunos.index');
});

Route::get('/ola', function () {
    return 'Olá, Laravel!';
});

Route::get('/alunos/{id}', function ($id) {
    return "Aluno: " . $id;
});

Route::get('/alunos', [AlunoController::class, 'index'])
    ->name('alunos.index');
Route::get('/alunos/{id}', [AlunoController::class, 'mostrar'])
    ->name('alunos.mostrar');
