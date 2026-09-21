<?php

use App\Http\Controllers\AlunoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('alunos.index');
});
Route::get('/alunos', [AlunoController::class, 'index'])
    ->name('alunos.index');
