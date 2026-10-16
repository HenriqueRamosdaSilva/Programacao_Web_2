<h1>Novo Curso</h1>
<form action="{{ route('cursos.store') }}" method="POST">
    @csrf
    <label>Nome:</label><input type="text" name="nome"><br><br>
    <label>Descrição:</label><textarea name="descricao"></textarea><br><br>
    <label>Carga Horária:</label><input type="number" name="carga_horaria"><br><br>
    <label>Ativo:</label>
    <select name="ativo">
        <option value="1">Sim</option>
        <option value="0">Não</option>
    </select><br><br>
    <button type="submit">Cadastrar</button>
</form>