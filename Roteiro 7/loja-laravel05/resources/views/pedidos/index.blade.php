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

    <form action="{{ route('pedidos.index') }}" method="GET" style="margin-bottom: 20px; padding: 10px; border: 1px solid #ccc;">
        <label for="cliente_id">Filtrar por Cliente:</label>
        <select name="cliente_id" id="cliente_id">
            <option value="">Todos os clientes</option>
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}" @selected(request('cliente_id') == $cliente->id)>
                    {{ $cliente->nome }}
                </option>
            @endforeach
        </select>
        <button type="submit">Filtrar</button>
        <a href="{{ route('pedidos.index') }}">Limpar Filtro</a>
    </form>

    @forelse ($pedidos as $pedido)
        <article>
            <p>Pedido #{{ $pedido->id }}</p>
            <p>Cliente: {{ $pedido->cliente->nome }}</p>
            <p>Data: {{ $pedido->data->format('d/m/Y') }}</p>
            <p>Valor: R$ {{ $pedido->valor }}</p>
        </article>
        <hr>
    @empty
        <p>Nenhum pedido encontrado.</p>
    @endforelse
</body>
</html>