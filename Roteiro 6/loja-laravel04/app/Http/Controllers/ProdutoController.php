<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $termo = trim((string) $request->input('busca', ''));
        $situacao = $request->input('ativo', 'todos');

        $consulta = Produto::with('categoria');

        if ($termo !== '') {
            $consulta->where('nome', 'ilike', '%' . $termo . '%');
        }

        if ($situacao === '1') {
            $consulta->where('ativo', true);
        } elseif ($situacao === '0') {
            $consulta->where('ativo', false);
        }

        $produtos = $consulta
            ->orderBy('nome')
            ->paginate(5)
            ->withQueryString();

        return view('produtos.index', [
            'produtos' => $produtos,
            'termo' => $termo,
            'situacao' => $situacao,
        ]);
    }
}