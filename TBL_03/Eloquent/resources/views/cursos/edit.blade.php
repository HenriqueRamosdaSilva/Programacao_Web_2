<h1>Editar Curso</h1>
<form action="{{ route('cursos.update', $curso->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Nome:</label><input type="text" name="nome" value="{{ $curso->nome }}"><br><br>
    <label>Descrição:</label><textarea name="descricao">{{ $curso->descricao }}</textarea><br><br>
    <label>Carga Horária:</label><input type="number" name="carga_horaria" value="{{ $curso->carga_horaria }}"><br><br>
    <label>Ativo:</label>
    <select name="ativo">
        <option value="1" {{ $curso->ativo ? 'selected' : '' }}>Sim</option>
        <option value="0" {{ !$curso->ativo ? 'selected' : '' }}>Não</option>
    </select><br><br>
    <button type="submit">Salvar Alterações</button>
</form>