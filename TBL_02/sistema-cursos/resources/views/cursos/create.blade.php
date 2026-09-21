<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Curso</title>
</head>
<body>
    <h1>Cadastrar Novo Curso</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cursos.store') }}" method="POST">
        @csrf
        <div>
            <label for="nome">Nome:</label><br>
            <input type="text" id="nome" name="nome" value="{{ old('nome') }}">
        </div>
        <div>
            <label for="descricao">Descrição:</label><br>
            <textarea id="descricao" name="descricao">{{ old('descricao') }}</textarea>
        </div>
        <div>
            <label for="carga_horaria">Carga Horária (horas):</label><br>
            <input type="number" id="carga_horaria" name="carga_horaria" value="{{ old('carga_horaria') }}">
        </div>
        <div>
            <label>
                <input type="checkbox" name="ativo" value="1" {{ old('ativo', true) ? 'checked' : '' }}> Ativo
            </label>
        </div>
        <br>
        <button type="submit">Salvar</button>
    </form>
    <br>
    <a href="{{ route('cursos.index') }}">Voltar à listagem</a>
</body>
</html>