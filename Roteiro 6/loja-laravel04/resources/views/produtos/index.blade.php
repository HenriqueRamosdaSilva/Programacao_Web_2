<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
</head>
<body>
    <h1>Produtos</h1>

    <form action="{{ route('produtos.index') }}" method="GET">
        <label for="busca">Pesquisar produto pelo nome:</label>
        <input
            type="text"
            id="busca"
            name="busca"
            value="{{ $termo }}"
            placeholder="Digite parte do nome"
        >

        <label for="ativo">Situação:</label>
        <select id="ativo" name="ativo">
            <option value="todos" {{ $situacao === 'todos' ? 'selected' : '' }}>Todos</option>
            <option value="1" {{ $situacao === '1' ? 'selected' : '' }}>Ativos</option>
            <option value="0" {{ $situacao === '0' ? 'selected' : '' }}>Inativos</option>
        </select>

        <button type="submit">Pesquisar</button>
        <a href="{{ route('produtos.index') }}">Limpar filtros</a>
    </form>

    <p>
        Exibindo {{ $produtos->count() }} registro(s) nesta página,
        de um total de {{ $produtos->total() }} encontrado(s).
    </p>

    <hr>

    @forelse ($produtos as $produto)
        <article>
            <p><strong>Produto:</strong> {{ $produto->nome }}</p>
            <p><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
            <p><strong>Categoria:</strong> {{ $produto->categoria->nome ?? 'Sem categoria' }}</p>
            <p><strong>Situação:</strong> {{ $produto->ativo ? 'Ativo' : 'Inativo' }}</p>
        </article>
        <hr>
    @empty
        <p>Nenhum produto corresponde aos filtros informados.</p>
    @endforelse

    <div>
        {{ $produtos->links() }}
    </div>
</body>
</html>