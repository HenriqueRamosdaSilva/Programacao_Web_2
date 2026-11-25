<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Clientes</title>
</head>
<body>
    <h1>Lista de Clientes</h1>

    @forelse ($clientes as $cliente)
        <article>
            <p><strong>Nome:</strong> {{ $cliente->nome }}</p>
            <p><strong>Email:</strong> {{ $cliente->email }}</p>
            
            <p><strong>Quantidade de Pedidos:</strong> {{ $cliente->pedidos_count }}</p>
            
            <p><a href="{{ route('clientes.pedidos', $cliente->id) }}">Ver detalhes dos pedidos deste cliente</a></p>
        </article>
        <hr>
    @empty
        <p>Nenhum cliente cadastrado.</p>
    @endforelse
</body>
</html>