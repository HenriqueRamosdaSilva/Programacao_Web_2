<?php

declare(strict_types=1);

class ContaBancaria
{
    private float $saldo;

    public function __construct(float $saldoInicial = 0.0)
    {
        if ($saldoInicial < 0) {
            throw new InvalidArgumentException('O saldo inicial não pode ser negativo.');
        }

        $this->saldo = $saldoInicial;
    }

    public function depositar(float $valor): void
    {
        if ($valor <= 0) {
            throw new InvalidArgumentException('O valor do depósito deve ser positivo.');
        }

        $this->saldo += $valor;
    }

    public function sacar(float $valor): bool
    {
        if ($valor <= 0) {
            return false;
        }

        if ($valor > $this->saldo) {
            return false;
        }

        $this->saldo -= $valor;

        return true;
    }

    public function getSaldo(): float
    {
        return $this->saldo;
    }
}

    $contaJoao = new ContaBancaria(1000.00);
    $contaMaria = new ContaBancaria(500.00);

    echo "\nAs duas contas";
    printf("\nConta de João: R$ %.2f\n", $contaJoao->getSaldo());
    printf("Conta de Maria: R$ %.2f\n", $contaMaria->getSaldo());

    echo "\nDeposito\n";
    $contaJoao->depositar(250.00);
    printf("Novo saldo de João: R$ %.2f\n", $contaJoao->getSaldo());

    echo "\n Saque com saldo insuficiente\n";
    $sucesso = $contaMaria->sacar(700.00);
    printf("Saque realizado? %s | saldo de Maria: R$ %.2f\n", $sucesso ? 'sim' : 'não', $contaMaria->getSaldo());

    $sucesso = $contaJoao->sacar(300.00);
    printf("\nSaque realizado? %s | saldo de João: R$ %.2f\n", $sucesso ? 'sim' : 'não', $contaJoao->getSaldo());

    printf("\nSaldo final de João: R$ %.2f\n", $contaJoao->getSaldo());
    printf("Saldo final de Maria: R$ %.2f\n", $contaMaria->getSaldo());