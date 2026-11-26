<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 12px; }
        th, td { border: 1px solid #999; padding: 6px; text-align: left; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h1>Relatório de Vendas</h1>
    <p><strong>Gerado em:</strong> {{ now()->format('d/m/Y H:i') }}</p>
    <p>
        <strong>Período consultado:</strong>
        {{ $dataInicio ? \Carbon\Carbon::parse($dataInicio)->format('d/m/Y') : 'Início' }}
        até
        {{ $dataFim ? \Carbon\Carbon::parse($dataFim)->format('d/m/Y') : 'Hoje' }}
        | <strong>Situação:</strong> {{ $status ? ucfirst($status) : 'Todas' }}
    </p>
    <p>
        <strong>Quantidade de pedidos:</strong> {{ $totalPedidos }} |
        <strong>Valor total:</strong> R$ {{ number_format($valorTotal, 2, ',', '.') }}
    </p>

    <table>
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
                    <td colspan="5">Nenhum pedido encontrado neste período.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>