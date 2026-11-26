<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Produto;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelatorioController extends Controller
{
    public function produtos(Request $request)
    {
        $request->validate([
            'busca' => ['nullable', 'string'],
            'preco_min' => ['nullable', 'numeric', 'min:0'],
            'preco_max' => ['nullable', 'numeric', 'min:0'],
            'ordenar' => ['nullable', 'in:nome_asc,nome_desc,preco_asc,preco_desc'],
        ]);

        $consulta = Produto::with('categoria');

        if ($request->filled('busca')) {
            $consulta->where('nome', 'ilike', '%' . trim($request->busca) . '%');
        }

        if ($request->filled('preco_min')) {
            $consulta->where('preco', '>=', $request->preco_min);
        }

        if ($request->filled('preco_max')) {
            $consulta->where('preco', '<=', $request->preco_max);
        }

        match ($request->input('ordenar', 'nome_asc')) {
            'nome_desc' => $consulta->orderBy('nome', 'desc'),
            'preco_asc' => $consulta->orderBy('preco', 'asc'),
            'preco_desc' => $consulta->orderBy('preco', 'desc'),
            default => $consulta->orderBy('nome', 'asc'),
        };

        $produtos = $consulta->paginate(10)->withQueryString();

        return view('relatorios.produtos', compact('produtos'));
    }

    private function montarConsultaPedidos(Request $request)
    {
        $request->validate([
            'data_inicio' => ['nullable', 'date'],
            'data_fim' => ['nullable', 'date', 'after_or_equal:data_inicio'],
            'status' => ['nullable', 'in:aberto,pago,cancelado'],
        ]);

        $consulta = Pedido::with('cliente');

        if ($request->filled('data_inicio')) {
            $consulta->whereDate('data', '>=', $request->data_inicio);
        }

        if ($request->filled('data_fim')) {
            $consulta->whereDate('data', '<=', $request->data_fim);
        }

        if ($request->filled('status')) {
            $consulta->where('status', $request->status);
        }

        return $consulta;
    }

    public function pedidos(Request $request)
    {
        $consulta = $this->montarConsultaPedidos($request);

        $totalPedidos = (clone $consulta)->count();
        $valorTotal = (clone $consulta)->sum('valor');
        $valorMedio = (clone $consulta)->avg('valor') ?? 0;

        $resumoStatus = (clone $consulta)
            ->reorder()
            ->select('status', DB::raw('COUNT(*) as quantidade'), DB::raw('SUM(valor) as valor_total'))
            ->groupBy('status')
            ->orderBy('status')
            ->get();

        $pedidos = (clone $consulta)
            ->orderBy('data', 'desc')
            ->paginate(15)
            ->withQueryString();

        return view('relatorios.pedidos', compact(
            'pedidos',
            'totalPedidos',
            'valorTotal',
            'valorMedio',
            'resumoStatus'
        ));
    }

    public function pedidosCsv(Request $request)
    {
        $consulta = $this->montarConsultaPedidos($request);

        return response()->streamDownload(function () use ($consulta) {
            $arquivo = fopen('php://output', 'w');
            fprintf($arquivo, chr(0xEF) . chr(0xBB) . chr(0xBF));
            fputcsv($arquivo, ['Pedido', 'Cliente', 'Data', 'Situação', 'Valor'], ';');

            $consulta->orderBy('data', 'desc')->chunk(500, function ($pedidos) use ($arquivo) {
                foreach ($pedidos as $pedido) {
                    fputcsv($arquivo, [
                        $pedido->id,
                        $pedido->cliente->nome ?? 'Não informado',
                        $pedido->data?->format('d/m/Y'),
                        $pedido->status,
                        number_format((float) $pedido->valor, 2, ',', '.'),
                    ], ';');
                }
            });

            fclose($arquivo);
        }, 'relatorio-pedidos.csv', [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }

    public function pedidosPdf(Request $request)
    {
        $consulta = $this->montarConsultaPedidos($request);

        $totalPedidos = (clone $consulta)->count();
        $valorTotal = (clone $consulta)->sum('valor');
        $pedidos = $consulta->orderBy('data', 'desc')->get();

        $pdf = Pdf::loadView('relatorios.pedidos-pdf', [
            'pedidos' => $pedidos,
            'totalPedidos' => $totalPedidos,
            'valorTotal' => $valorTotal,
            'dataInicio' => $request->data_inicio,
            'dataFim' => $request->data_fim,
            'status' => $request->status,
        ]);

        return $pdf->download('relatorio-pedidos.pdf');
    }
}
