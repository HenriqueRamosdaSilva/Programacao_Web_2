<?php

namespace App\Http\Controllers;
use App\Models\Aluno;
use Illuminate\Http\Request;
class AlunoController extends Controller
{
public function index()
{
$alunos = Aluno::orderBy('nome')->get();
return view('alunos.index', [
'alunos' => $alunos,
]);
}
public function create()
{
return view('alunos.create');
}
public function store(Request $request)
{
$dados = $request->validate([
'nome' => ['required', 'string', 'max:255'],
'email' => ['required', 'email', 'max:255', 'unique:alunos,email'],
'data_nascimento' => ['nullable', 'date'],
]);
Aluno::create($dados);
return redirect()->route('alunos.index');
}
public function show(Aluno $aluno)
{
return view('alunos.show', [
'aluno' => $aluno,
]);
}
public function destroy(Aluno $aluno)
{
$aluno->delete();
return redirect()->route('alunos.index');
}
}


//namespace App\Http\Controllers;
//use App\Models\Aluno;
//use Illuminate\Http\Request;

//class AlunoController extends Controller
//{
//    public function index()
//    {
//        $alunos = Aluno::all();
//
//        return view('alunos.index', ['alunos' => $alunos]);
//    }
//}






//namespace App\Http\Controllers;

//class AlunoController extends Controller
//{
    //public function index()
    //{
        //return 'Lista de alunos';
        //}
//        public function mostrar($id)
//    {
//        return 'Aluno: ' . $id;
//   }
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

//    public function index()
//    {
//        $alunos = [//
//            'Ana',
//            'Bruno',
//            'Carlos'
//        ];
//        return view('alunos', [
//            'alunos' => $alunos
//        ]);
//    }
//}


