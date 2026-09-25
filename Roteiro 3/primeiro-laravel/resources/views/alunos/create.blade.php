<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar aluno</title>
</head>

<body>
    <h1>Cadastrar aluno</h1>
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <form method="POST" action="{{ route('alunos.store') }}">
        @csrf
        <label for="nome">Nome</label>
        <input id="nome" name="nome" type="text"
            value="{{ old('nome') }}">
        <label for="email">E-mail</label>
        <input id="email" name="email" type="email"
            value="{{ old('email') }}">
        <label for="data_nascimento">Data de nascimento</label>
        <input id="data_nascimento" name="data_nascimento"
            type="date" value="{{ old('data_nascimento') }}">
        <button type="submit">Cadastrar</button>
    </form>
    <a href="{{ route('alunos.index') }}">Voltar</a>
</body>

</html>