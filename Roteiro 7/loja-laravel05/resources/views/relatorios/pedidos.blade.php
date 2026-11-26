<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel Gerencial - Relatório de Vendas</title>
</head>
<body>
    <h1>Painel Gerencial - Relatório de Vendas</h1>

    @if ($errors->any())
        <div style="color: red;">
            @foreach ($errors->all() as $erro)
                <p>{{ $erro }}</p>
            @endforeach
        </div>
    @endif

    <form method="GET" action="{{ route('relatorios.pedidos') }}">
        <label>Data inicial:</label>
        <input type="date" name="data_inicio" value="{{ request('data_inicio') }}">

        <label>Data final:</label>
        <input type="date" name="data_fim" value="{{ request('data_fim') }}">

        <label>Situação:</label>
        <select name="status">
            <option value="">Todas</option>
            <option value="aberto" @selected(request('status') === 'aberto')>Aberto</option>
            <option value="pago" @selected(request('status') === 'pago')>Pago</option>
            <option value="cancelado" @selected(request('status') === 'cancelado')>Cancelado</option>
        </select>

        <button type="submit">Filtrar</button>
        <a href="{{ route('relatorios.pedidos') }}">Limpar</a>
    </form>

    <p>
        <a href="{{ route('relatorios.pedidos.csv', request()->query()) }}">Exportar CSV</a> |
        <a href="{{ route('relatorios.pedidos.pdf', request()->query()) }}">Exportar PDF</a>
    </p>

    <hr>

    <h2>Indicadores do Período</h2>
    <ul>
        <li><strong>Quantidade total de pedidos:</strong> {{ $totalPedidos }}</li>
        <li><strong>Valor total vendido:</strong> R$ {{ number_format($valorTotal, 2, ',', '.') }}</li>
        <li><strong>Valor médio dos pedidos:</strong> R$ {{ number_format($valorMedio, 2, ',', '.') }}</li>
    </ul>

    <h2>Resumo por Situação</h2>
    @if ($resumoStatus->count() > 0)
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>Situação</th>
                    <th>Quantidade</th>
                    <th>Valor Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resumoStatus as $item)
                    <tr>
                        <td>{{ ucfirst($item->status) }}</td>
                        <td>{{ $item->quantidade }}</td>
                        <td>R$ {{ number_format($item->valor_total, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nenhum dado agrupado para o período selecionado.</p>
    @endif

    <hr>

    <h2>Listagem Detalhada</h2>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Pedido</th>
                <th>Cliente</th>
                <th>Data</th>
                <th>Situação</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pedidos as $pedido)
                <tr>
                    <td>#{{ $pedido->id }}</td>
                    <td>{{ $pedido->cliente->nome ?? 'Não informado' }}</td>
                    <td>{{ $pedido->data?->format('d/m/Y') }}</td>
                    <td>{{ ucfirst($pedido->status) }}</td>
                    <td>R$ {{ number_format($pedido->valor, 2, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhum pedido encontrado para os filtros informados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div>
        {{ $pedidos->links() }}
    </div>
</body>
</html>