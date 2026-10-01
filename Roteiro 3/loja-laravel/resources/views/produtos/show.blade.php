<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>{{ $produto->nome }}</title>
</head>

<body>
    <h1>{{ $produto->nome }}</h1>
    <p><strong>Descrição:</strong> {{ $produto->descricao }}</p>
    <p><strong>Preço:</strong> R$ {{ $produto->preco }}</p>
    <p><strong>Quantidade:</strong> {{ $produto->quantidade }}</p>
    <p><strong>Status:</strong> {{ $produto->ativo ? 'Ativo' : 'Inativo' }}</p>
    <form action="{{ route('produtos.destroy', $produto) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Excluir produto</button>
    </form>
    <p><a href="{{ route('produtos.index') }}">Voltar para produtos</a></p>
</body>

</html>