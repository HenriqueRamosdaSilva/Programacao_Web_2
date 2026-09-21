<?php
namespace App\Http\Controllers;
use App\Models\Aluno;
class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::orderBy('nome')->get();
        return view('alunos.index', [
            'alunos' => $alunos,
        ]);
    }
}
