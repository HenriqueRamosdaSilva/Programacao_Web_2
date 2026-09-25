<?php


namespace App\Http\Controllers;

class AlunoController extends Controller
{
    //public function index()
    //{
    //return 'Lista de alunos';
    //}
    public function mostrar($id)
    {
        return 'Aluno: ' . $id;
    }
    //public function index()
    //{
    //return view('alunos');
    //}

    //public function index()
    //{
        //$aluno = 'João';
        //return view('alunos', [
        //    'aluno' => $aluno
        //]);
    //}

    public function index()
    {
        $alunos = [
            'Ana',
            'Bruno',
            'Carlos'
        ];
        return view('alunos', [
            'alunos' => $alunos
        ]);
    }
}
