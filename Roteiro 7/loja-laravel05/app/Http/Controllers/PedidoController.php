<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index(Request $request) 
    {
        $query = Pedido::with('cliente');

        if ($request->filled('cliente_id')) {
            $query->where('cliente_id', $request->cliente_id);
        }

        $pedidos = $query->orderBy('data', 'desc')->get();

        $clientes = Cliente::orderBy('nome')->get();

        return view('pedidos.index', compact('pedidos', 'clientes'));

        $pedidos = Pedido::with('cliente')
            ->orderBy('data', 'desc')
            ->get();
        return view('pedidos.index', compact('pedidos'));
    }
    public function create()
    {
        $clientes = Cliente::orderBy('nome')->get();
        return view('pedidos.create', compact('clientes'));
    }
    public function store(Request $request)
    {
        $dados = $request->validate([
            'cliente_id' => ['required', 'exists:clientes,id'],
            'data' => ['required', 'date'],
            'valor' => ['required', 'numeric', 'min:0'],
        ]);
        Pedido::create($dados);
        return redirect()->route('pedidos.index')
            ->with('sucesso', 'Pedido cadastrado com sucesso!');
    }
}
