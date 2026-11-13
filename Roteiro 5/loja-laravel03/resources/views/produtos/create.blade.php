<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Novo Produto</title>
</head>

<body>
    <h1>Novo Produto</h1>
    @if($errors->any())
    <ul>
        @foreach($errors->all() as $erro)
        <li>{{ $erro }}</li>
        @endforeach
    </ul>
    @endif
    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf
        <label>Nome:</label>
        <input type="text" name="nome" value="{{ old('nome') }}">
        <br><br>
        <label>Descrição:</label>
        <textarea name="descricao">{{ old('descricao') }}</textarea>
        <br><br>
        <label>Preço:</label>
        <input type="number" name="preco" step="0.01" min="0" value="{{ old('preco') }}">
        <br><br>
        <label>Quantidade:</label>
        <input type="number" name="quantidade" min="0" value="{{ old('quantidade') }}">
        <br><br>
        <label>Ativo:</label>
        <select name="ativo">
            <option value="1" {{ old('ativo', '1') == '1' ? 'selected' : '' }}>Sim</option>
            <option value="0" {{ old('ativo') === '0' ? 'selected' : '' }}>Não</option>
        </select>
        <br><br>
        <button type="submit">Cadastrar</button>
    </form>
    <p><a href="{{ route('produtos.index') }}">Voltar</a></p>
</body>

</html>