<!--<!DOCTYPE html>
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

</html>-->

<!--<!DOCTYPE html>
<html>
<head>
    <title>Lista de Alunos</title>
</head>
<body>
    <h1>Alunos Cadastrados</h1>

    <ul>
        O Blade (@) permite rodar lógica do PHP direto no HTML
        @foreach($alunos as $aluno)
            <li>{{ $aluno->nome }} - {{ $aluno->email }}</li>
        @endforeach
    </ul>
</body>
</html>-->


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Alunos</title>
</head>

<body>
    <h1>Alunos cadastrados</h1>
    <a href="{{ route('alunos.create') }}">Novo aluno</a>
    @if ($alunos->isEmpty())
    <p>Nenhum aluno cadastrado.</p>
    @else
    <ul>
        @foreach ($alunos as $aluno)
        <li>
            <a href="{{ route('alunos.show', $aluno) }}">
                {{ $aluno->nome }}
            </a>
            - {{ $aluno->email }}
        </li>
        @endforeach
    </ul>
    @endif
</body>

</html>