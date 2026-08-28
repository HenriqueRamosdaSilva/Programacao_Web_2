<?php

declare(strict_types=1);

class Produto
{
    private string $nome;
    private float $preco;
    private int $estoque;

    public function __construct(string $nome, float $preco, int $estoque)
    {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->estoque = $estoque;
    }

    public function aplicarDesconto(float $percentual): void
    {
        if ($percentual < 0 || $percentual > 100) {
            throw new InvalidArgumentException('Percentual de desconto inválido.');
        }

        $novoPreco = $this->preco * (1 - $percentual / 100);

        if ($novoPreco < 0) {
            throw new InvalidArgumentException('O desconto deixaria o preço negativo.');
        }

        $this->preco = $novoPreco;
    }

    public function reporEstoque(int $quantidade): void
    {
        if ($quantidade <= 0) {
            throw new InvalidArgumentException('Quantidade de reposição deve ser positiva.');
        }

        $this->estoque += $quantidade;
    }

    public function vender(int $quantidade): bool
    {
        if ($quantidade <= 0) {
            return false;
        }

        if ($quantidade > $this->estoque) {
            return false;
        }

        $this->estoque -= $quantidade;

        return true;
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

    $mouse = new Produto('Mouse Gamer', 150.00, 10);
    $teclado = new Produto('Teclado Mecânico', 300.00, 5);

    printf("\n%s: R$ %.2f | estoque: %d\n", $mouse->getNome(), $mouse->getPreco(), $mouse->getEstoque());
    printf("%s: R$ %.2f | estoque: %d\n", $teclado->getNome(), $teclado->getPreco(), $teclado->getEstoque());

    $mouse->aplicarDesconto(10);
    printf("\nNovo preço do %s: R$ %.2f\n", $mouse->getNome(), $mouse->getPreco());

    $sucesso = $mouse->vender(3);
    printf("\nVenda realizada? %s | estoque restante: %d\n", $sucesso ? 'sim' : 'não', $mouse->getEstoque());

    echo "\nNão vai ter estoque suficiente";
    $sucesso = $teclado->vender(100);
    printf("\nVenda realizada? %s | estoque restante: %d\n", $sucesso ? 'sim' : 'não', $teclado->getEstoque());

    $teclado->reporEstoque(20);
    printf("\nNovo estoque do %s: %d\n", $teclado->getNome(), $teclado->getEstoque());
