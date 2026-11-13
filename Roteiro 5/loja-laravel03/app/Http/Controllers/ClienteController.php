<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function pedidos(Cliente $cliente)
    {
       
        $pedidos = $cliente->pedidos;

        return view('clientes.pedidos', compact('cliente', 'pedidos'));
    }
}