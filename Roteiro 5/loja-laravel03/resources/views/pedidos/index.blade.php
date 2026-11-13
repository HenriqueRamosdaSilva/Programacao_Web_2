<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Pedidos</title>
</head>

<body>
    <h1>Pedidos</h1>
    @if (session('sucesso'))
    <p>{{ session('sucesso') }}</p>
    @endif
    <p><a href="{{ route('pedidos.create') }}">Novo pedido</a></p>
    @forelse ($pedidos as $pedido)
    <article>
        <p>Pedido #{{ $pedido->id }}</p>
        <p>Cliente: {{ $pedido->cliente->nome }}</p>
        <p>Data: {{ $pedido->data->format('d/m/Y') }}</p>
        <p>Valor: R$ {{ $pedido->valor }}</p>
    </article>
    <hr>
    @empty
    <p>Nenhum pedido cadastrado.</p>
    @endforelse
</body>

</html>