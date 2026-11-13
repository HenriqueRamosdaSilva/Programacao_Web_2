<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        
        $clientes = Cliente::withCount('pedidos')->get();

        return view('clientes.index', compact('clientes'));
    }

    public function pedidos(Cliente $cliente)
    {
       
        $pedidos = $cliente->pedidos;

        return view('clientes.pedidos', compact('cliente', 'pedidos'));
    }
}