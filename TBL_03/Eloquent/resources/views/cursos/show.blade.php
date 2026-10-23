<h1>{{ $curso->nome }}</h1>
<p><strong>Descrição:</strong> {{ $curso->descricao }}</p>
<p><strong>Carga Horária:</strong> {{ $curso->carga_horaria }} horas</p>
<p><strong>Status:</strong> {{ $curso->ativo ? 'Ativo' : 'Inativo' }}</p>

<form action="{{ route('cursos.destroy', $curso->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" style="color:red">Excluir Curso</button>
</form>
<br>
<a href="{{ route('cursos.index') }}">Voltar para a lista</a>