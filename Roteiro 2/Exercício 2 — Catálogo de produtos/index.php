<?php

require_once 'funcoes.php';

$Produtos = [
    [
        "nome" => "Teclado",
        "preco" => 120,
        "estoque" => 12
    ],
    [
        "nome" => "Mouse",
        "preco" => 80,
        "estoque" => 15
    ],
    [
        "nome" => "Monitor",
        "preco" => 800,
        "estoque" => 5
    ],
    [
        "nome" => "Computador",
        "preco" => 1500,
        "estoque" => 0
    ],
    [
        "nome" => "Caneta",
        "preco" => 1,
        "estoque" => 25
    ],
];

$totalEstoque = 0;

foreach ($Produtos as $Produto) {
    if ($Produto["estoque"] > 0) {

        $valorEstoque = calcularValorEstoque(
            $Produto["preco"],
            $Produto["estoque"]
        );

        echo "Produto: " . $Produto["nome"] . "\n";
        echo "Preço: R$ " . $Produto["preco"] . "\n";
        echo "Estoque: " . $Produto["estoque"] . "\n";
        echo "Valor em estoque: R$ " . $valorEstoque . "\n";

        $totalEstoque += $valorEstoque;
    }
}

echo "Valor total do estoque: R$ " . $totalEstoque;
