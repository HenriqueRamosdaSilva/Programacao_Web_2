<h1>Editar produto</h1>

<form action="{{ route('produtos.update', $produto) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nome</label>
    <input type="text" name="nome" value="{{ old('nome', $produto->nome) }}">

    <label>Descrição</label>
    <textarea name="descricao">{{ old('descricao', $produto->descricao) }}</textarea>

    <label>Preço</label>
    <!-- Correção: $produto->preco na mesma linha -->
    <input type="number" step="0.01" name="preco" value="{{ old('preco', $produto->preco) }}">

    <label>Quantidade</label>
    <!-- Correção: $produto->quantidade na mesma linha -->
    <input type="number" name="quantidade" value="{{ old('quantidade', $produto->quantidade) }}">

    <!-- Novo campo adicionado para passar na validação do Controller -->
    <label>Ativo</label>
    <select name="ativo">
        <option value="1" {{ old('ativo', $produto->ativo) == 1 ? 'selected' : '' }}>Sim</option>
        <option value="0" {{ old('ativo', $produto->ativo) == 0 ? 'selected' : '' }}>Não</option>
    </select>

    <button type="submit">Salvar alterações</button>
</form>

<hr>

<form action="{{ route('produtos.destroy', $produto) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" style="color: red;">Excluir Produto</button>
</form>