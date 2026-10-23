<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $consulta = Produto::query();

        // Ex. 1.3: buscar por ID
        if ($request->filled('id')) {
            $consulta->where('id', $request->input('id'));
        }

        // Ex. 1.4 e Ex. 3: busca por nome (contém, começa com ou exato)
        if ($request->filled('nome')) {
            $nome = $request->input('nome');
            $tipo = $request->input('tipo_nome', 'contem');

            if ($tipo === 'exato') {
                $consulta->where('nome', $nome);                  // = 'Monitor'
            } elseif ($tipo === 'comeca') {
                $consulta->where('nome', 'like', $nome . '%');    // 'gamer%'
            } else {
                $consulta->where('nome', 'like', '%' . $nome . '%'); // '%gamer%'
            }
        }

        // Ex. 1.2 e Ex. 2: faixa de preço (cada limite é independente)
        if ($request->filled('preco_minimo')) {
            $consulta->where('preco', '>=', $request->input('preco_minimo'));
        }
        if ($request->filled('preco_maximo')) {
            $consulta->where('preco', '<=', $request->input('preco_maximo'));
        }

        // Ex. 1.1 e Ex. 2: status
        if ($request->input('ativo') === '1') {
            $consulta->where('ativo', true);
        } elseif ($request->input('ativo') === '0') {
            $consulta->where('ativo', false);
        }

        // Ex. 1.5 e Ex. 2: ordenação (só campos permitidos)
        $camposOrdenaveis = ['id', 'nome', 'preco'];
        $ordenarPor = in_array($request->input('ordenar_por'), $camposOrdenaveis)
            ? $request->input('ordenar_por')
            : 'nome';
        $direcao = $request->input('direcao') === 'desc' ? 'desc' : 'asc';

        $produtos = $consulta->orderBy($ordenarPor, $direcao)->get();

        return view('produtos.index', ['produtos' => $produtos]);
    }
}