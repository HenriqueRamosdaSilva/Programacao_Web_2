<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Produtos</title>
</head>
<body>
    <h1>Relatório de Produtos</h1>

    <form method="GET" action="{{ route('relatorios.produtos') }}">
        <label>Nome:</label>
        <input type="text" name="busca" value="{{ request('busca') }}" placeholder="Parte do nome">

        <label>Preço mínimo:</label>
        <input type="number" step="0.01" name="preco_min" value="{{ request('preco_min') }}">

        <label>Preço máximo:</label>
        <input type="number" step="0.01" name="preco_max" value="{{ request('preco_max') }}">

        <label>Ordenar por:</label>
        <select name="ordenar">
            <option value="nome_asc" @selected(request('ordenar', 'nome_asc') === 'nome_asc')>Nome (A-Z)</option>
            <option value="nome_desc" @selected(request('ordenar') === 'nome_desc')>Nome (Z-A)</option>
            <option value="preco_asc" @selected(request('ordenar') === 'preco_asc')>Menor Preço</option>
            <option value="preco_desc" @selected(request('ordenar') === 'preco_desc')>Maior Preço</option>
        </select>

        <button type="submit">Filtrar</button>
        <a href="{{ route('relatorios.produtos') }}">Limpar</a>
    </form>

    <hr>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Situação</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->categoria->nome ?? 'Sem categoria' }}</td>
                    <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                    <td>{{ $produto->ativo ? 'Ativo' : 'Inativo' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhum produto encontrado com os filtros informados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div>
        {{ $produtos->links() }}
    </div>
</body>
</html>