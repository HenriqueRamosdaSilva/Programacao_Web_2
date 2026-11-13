<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $busca = trim((string) $request->query('busca', ''));

        $produtos = Produto::query()
            ->when($busca !== '', function ($query) use ($busca) {
                
                $termo = str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $busca);

                $query->where('nome', 'ilike', '%' . $termo . '%');
            })
            ->orderBy('nome')
            ->get();

        return view('produtos.index', compact('produtos', 'busca'));
    }
    public function create()
    {
        return view('produtos.create');
    }
    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:150|unique:produtos,nome',
            'descricao' => 'required|string',
            'preco' => 'required|numeric|min:0',
            'quantidade' => 'required|integer|min:0',
            'ativo' => 'required|boolean',
        ]);
        Produto::create($dados);
        return redirect()
            ->route('produtos.index')
            ->with('success', 'Produto cadastrado com sucesso.');
    }
    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()
            ->route('produtos.index')
            ->with('success', 'Produto excluído com sucesso.');
    }
}
