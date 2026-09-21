<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos</title>
</head>

<body>
    <h1>Alunos cadastrados</h1>
    @if ($alunos->isEmpty())
    <p>Nenhum aluno cadastrado.</p>
    @else
    <ul>
        @foreach ($alunos as $aluno)
        <li>
            {{ $aluno->nome }} - {{ $aluno->email }}
        </li>
        @endforeach
    </ul>
    @endif
</body>

</html>