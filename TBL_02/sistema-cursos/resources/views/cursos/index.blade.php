<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Cursos</title>
</head>
<body>
    <h1>Cursos Oferecidos</h1>
    <a href="{{ route('cursos.create') }}">Cadastrar Novo Curso</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Carga Horária</th>
                <th>Ativo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cursos as $curso)
                <tr>
                    <td>{{ $curso->id }}</td>
                    <td>{{ $curso->nome }}</td>
                    <td>{{ $curso->carga_horaria }}h</td>
                    <td>{{ $curso->ativo ? 'Sim' : 'Não' }}</td>
                    <td>
                        <a href="{{ route('cursos.show', $curso->id) }}">Detalhes</a>
                        <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Deseja realmente excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhum curso cadastrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>