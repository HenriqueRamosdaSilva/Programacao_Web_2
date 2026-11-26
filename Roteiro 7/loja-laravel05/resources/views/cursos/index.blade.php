<h1>Cursos</h1>
<a href="{{ route('cursos.create') }}">Novo Curso</a>

<hr>

<form action="{{ route('cursos.index') }}" method="GET">
    <label for="busca">Pesquisar por nome:</label>
    <input
        type="text"
        id="busca"
        name="busca"
        value="{{ $termo }}"
        placeholder="Ex.: Laravel"
    >

    <label for="carga_minima">Carga horária mínima (h):</label>
    <input
        type="number"
        id="carga_minima"
        name="carga_minima"
        value="{{ $cargaMinima }}"
        min="1"
        placeholder="Ex.: 40"
    >

    <button type="submit">Filtrar</button>
    <a href="{{ route('cursos.index') }}">Limpar filtros</a>
</form>

<p>
    Exibindo {{ $cursos->count() }} registro(s) nesta página,
    de um total de {{ $cursos->total() }} encontrado(s).
</p>

<hr>

@forelse($cursos as $curso)
    <p>
        <strong>{{ $curso->nome }}</strong> - {{ $curso->carga_horaria }}h 
        ({{ $curso->ativo ? 'Ativo' : 'Inativo' }})
        <br>
        <a href="{{ route('cursos.show', $curso->id) }}">Ver Detalhes</a> |
        <a href="{{ route('cursos.edit', $curso->id) }}">Editar</a>
    </p>
@empty
    <p>Nenhum curso corresponde aos filtros informados.</p>
@endforelse

<div>
    {{ $cursos->links() }}
</div>