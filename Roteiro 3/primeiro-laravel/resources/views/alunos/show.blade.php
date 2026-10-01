<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Detalhes do aluno</title>
</head>

<body>
    <h1>Detalhes do aluno</h1>
    <p><strong>ID:</strong> {{ $aluno->id }}</p>
    <p><strong>Nome:</strong> {{ $aluno->nome }}</p>
    <p><strong>E-mail:</strong> {{ $aluno->email }}</p>
    @if ($aluno->data_nascimento)
    <p>
        <strong>Nascimento:</strong>
        {{ $aluno->data_nascimento->format('d/m/Y') }}
    </p>
    @endif
    <form method="POST"
        action="{{ route('alunos.destroy', $aluno) }}">
        @csrf
        @method('DELETE')
        <button type="submit">Excluir</button>
    </form>
    <a href="{{ route('alunos.index') }}">Voltar</a>
</body>

</html>