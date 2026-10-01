<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
</head>

<body>
    <h1>Produtos</h1>
    @if(session('success'))
    <p>{{ session('success') }}</p>
    @endif
    <p>
        <a href="{{ route('produtos.create') }}">Novo produto</a>
    </p>
    <form action="{{ route('produtos.index') }}" method="GET">
        <input type="text" name="busca" placeholder="Buscar por nome" value="{{ $busca }}">
        <button type="submit">Buscar</button>

        @if($busca !== '')
        <a href="{{ route('produtos.index') }}">Limpar busca</a>
        @endif
    </form>
    @forelse($produtos as $produto)
    <article>
        <h2>{{ $produto->nome }}</h2>
        <p>Preço: R$ {{ $produto->preco }}</p>
        <p>Estoque: {{ $produto->quantidade }}</p>
        <p>Status: {{ $produto->ativo ? 'Ativo' : 'Inativo' }}</p>
        <a href="{{ route('produtos.show', $produto) }}">Ver detalhes</a>
    </article>
    <hr>
    @empty
    @if($busca !== '')
    <p>Nenhum produto encontrado para "{{ $busca }}".</p>
    @else
    <p>Nenhum produto cadastrado.</p>
    @endif
    @endforelse
</body>

</html>