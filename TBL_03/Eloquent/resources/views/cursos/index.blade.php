<h1>Cursos</h1>
<a href="{{ route('cursos.create') }}">Novo Curso</a>
<hr>
@foreach($cursos as $curso)
    <p>
        <strong>{{ $curso->nome }}</strong> - {{ $curso->carga_horaria }}h 
        ({{ $curso->ativo ? 'Ativo' : 'Inativo' }})
        <br>
        <a href="{{ route('cursos.show', $curso->id) }}">Ver Detalhes</a> |
        <a href="{{ route('cursos.edit', $curso->id) }}">Editar</a>
    </p>
@endforeach