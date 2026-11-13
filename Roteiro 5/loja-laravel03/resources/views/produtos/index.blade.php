<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
</head>
<body>
    <h1>Produtos</h1>

    @forelse ($produtos as $produto)
        <article>
            <p><strong>Produto:</strong> {{ $produto->nome }}</p>
            <p><strong>Preço:</strong> R$ {{ $produto->preco }}</p>
            <!-- Aqui exibimos o NOME da categoria através do relacionamento -->
            <p><strong>Categoria:</strong> {{ $produto->categoria->nome }}</p>
        </article>
        <hr>
    @empty
        <p>Nenhum produto cadastrado.</p>
    @endforelse
</body>
</html>