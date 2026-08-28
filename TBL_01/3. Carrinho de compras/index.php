<?php

declare(strict_types=1);

class Produto
{
    private string $nome;
    private float $preco;
    private int $estoque;

    public function __construct(string $nome, float $preco, int $estoque)
    {
        if ($preco < 0) {
            throw new InvalidArgumentException('O preço não pode ser negativo.');
        }
        if ($estoque < 0) {
            throw new InvalidArgumentException('O estoque não pode ser negativo.');
        }

        $this->nome = $nome;
        $this->preco = $preco;
        $this->estoque = $estoque;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function getEstoque(): int
    {
        return $this->estoque;
    }
}


class Carrinho
{
    private array $itens = [];

    public function adicionarProduto(Produto $produto, int $quantidade): void
    {
        if ($quantidade <= 0) {
            throw new InvalidArgumentException('A quantidade deve ser positiva.');
        }

        $this->itens[] = [
            'produto' => $produto,
            'quantidade' => $quantidade,
        ];
    }

    public function calcularValorTotal(): float
    {
        $total = 0.0;

        foreach ($this->itens as $item) {
            $total += $item['produto']->getPreco() * $item['quantidade'];
        }

        return $total;
    }

    public function calcularQuantidadeTotal(): int
    {
        $quantidade = 0;

        foreach ($this->itens as $item) {
            $quantidade += $item['quantidade'];
        }

        return $quantidade;
    }

    public function limpar(): void
    {
        $this->itens = [];
    }
}

    $mouse = new Produto('Mouse Gamer', 150.00, 10);
    $teclado = new Produto('Teclado Mecânico', 300.00, 5);
    $monitor = new Produto('Monitor 24"', 900.00, 3);

    $carrinho = new Carrinho();
    $carrinho->adicionarProduto($mouse, 2);
    $carrinho->adicionarProduto($teclado, 1);
    $carrinho->adicionarProduto($monitor, 1);

    echo "Carrinho\n";
    printf("Quantidade total de itens: %d\n", $carrinho->calcularQuantidadeTotal());
    printf("Valor total: R$ %.2f\n", $carrinho->calcularValorTotal());

    echo "\nLimpar co carrinho\n";
    $carrinho->limpar();
    printf("Quantidade total de itens: %d\n", $carrinho->calcularQuantidadeTotal());
    printf("Valor total: R$ %.2f\n", $carrinho->calcularValorTotal());