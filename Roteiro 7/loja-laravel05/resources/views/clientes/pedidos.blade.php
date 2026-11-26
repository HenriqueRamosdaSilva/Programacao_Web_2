<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Pedidos de {{ $cliente->nome }}</title>
</head>

<body>
    <h1>Pedidos de {{ $cliente->nome }}</h1>

    @forelse ($pedidos as $pedido)
    <article>
        <p>Pedido #{{ $pedido->id }}</p>
        <p>Data: {{ $pedido->data->format('d/m/Y') }}</p>
        <p>Valor: R$ {{ $pedido->valor }}</p>
    </article>
    <hr>
    @empty
    <p>Este cliente ainda não possui pedidos cadastrados.</p>
    @endforelse

    <p><a href="{{ route('pedidos.index') }}">Voltar para a lista geral</a></p>
</body>

</html>