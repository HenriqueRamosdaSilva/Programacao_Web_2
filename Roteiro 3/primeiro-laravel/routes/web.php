<?php




use App\Http\Controllers\AlunoController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
return redirect()->route('alunos.index');
});
Route::get('/alunos', [AlunoController::class, 'index'])
->name('alunos.index');
Route::get('/alunos/criar', [AlunoController::class, 'create'])
->name('alunos.create');
Route::post('/alunos', [AlunoController::class, 'store'])
->name('alunos.store');
Route::get('/alunos/{aluno}', [AlunoController::class, 'show'])
->name('alunos.show');
Route::delete('/alunos/{aluno}', [AlunoController::class, 'destroy'])
->name('alunos.destroy');

//use App\Http\Controllers\AlunoController;
//use Illuminate\Support\Facades\Route;

//Route::get('/alunos', [AlunoController::class, 'index']);

//Route::get('/', function () {//
//    return redirect()->route('alunos.index');
//});
//
//Route::get('/ola', function () {
//    return 'Olá, Laravel!';
//});

//Route::get('/alunos/{id}', function ($id) {
//    return "Aluno: " . $id;
//});

//Route::get('/alunos', [AlunoController::class, 'index'])
//    ->name('alunos.index');
//Route::get('/alunos/{id}', [AlunoController::class, 'mostrar'])
//    ->name('alunos.mostrar');
