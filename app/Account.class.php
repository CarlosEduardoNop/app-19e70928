<?php

class Account
{
    private $name;
    private $balance;
    private array $extract;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function deposit($value)
    {
        $this->balance += $value;
        $this->inputExtract([
            "Movimentação" => "Depósito",
            "Valor depositado" => $value,
            "Dinheiro em conta" => $this->getBalance()
        ]);
    }

    public function withdrawMoney($value)
    {
        if ($this->balance > 0 and $this->balance >= $value) {
            $this->balance -= $value;
            $this->inputExtract([
                "Movimentação" => "Saque",
                "Valor Sacado" => $value,
                "Dinheiro em conta" => $this->getBalance() - $value
            ]);
        } else {
            echo "Saldo insuficiente, {$this->getBalanceToString()} <br>";
        }
    }

    public function getBalanceToString()
    {
        return "Saldo da conta de {$this->name} é de R$ " . number_format($this->balance, 2, ",", ".") . "<br>";
    }

    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param mixed $balance
     */
    public function setBalance($balance): void
    {
        $this->balance = $balance;
    }

    public function inputExtract($info)
    {
        $this->extract[] = $info;
    }

    public function getExtract()
    {
        echo $this->getBalanceToString();
        var_dump($this->extract);
    }
}