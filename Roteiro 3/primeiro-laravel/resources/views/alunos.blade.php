<!DOCTYPE html>
<html lang="pt-BR">

@extends('layouts.app')
@section('conteudo')
<h2>Alunos</h2>
<p>Conteúdo da página.</p>
@endsection

<head>
    <meta charset="UTF-8">
    <title>Alunos</title>
</head>

<body>
    <h1>Lista de alunos</h1>
    <p>Esta página foi criada com Laravel e Blade.</p>
    <h1>Alunos</h1>
    <ul>
        @foreach ($alunos as $aluno)
        <li>{{ $aluno }}</li>
        @endforeach
    </ul>
</body>

</html>