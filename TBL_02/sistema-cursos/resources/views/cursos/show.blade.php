<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Curso</title>
</head>
<body>
    <h1>Detalhes do Curso: {{ $curso->nome }}</h1>
    <p><strong>ID:</strong> {{ $curso->id }}</p>
    <p><strong>Descrição:</strong> {{ $curso->descricao }}</p>
    <p><strong>Carga Horária:</strong> {{ $curso->carga_horaria }} horas</p>
    <p><strong>Ativo:</strong> {{ $curso->ativo ? 'Sim' : 'Não' }}</p>
    <p><strong>Criado em:</strong> {{ $curso->created_at }}</p>
    <p><strong>Atualizado em:</strong> {{ $curso->updated_at }}</p>

    <a href="{{ route('cursos.index') }}">Voltar à listagem</a>
</body>
</html>