<?php
require_once "Account.class.php";

final class SavingsAccount extends Account
{

    private $investmentDate;
    private $withdrawLimit = 2;
    private $withdraw = 0;

    public function __construct()
    {
        $this->investmentDate = date('d-m-Y', strtotime('+1 month'));
    }

    final public function withdrawMoney($value)
    {
        if ($this->getBalance() > 0 and ($this->getBalance() >= $value and ($this->withdraw < $this->withdrawLimit))) {
            $this->withdraw += 1;
            $this->inputExtract([
                "Movimentação" => "Saque",
                "Valor Sacado" => $value,
                "Dinheiro em conta" => $this->getBalance() - $value
            ]);
            $this->setBalance($this->getBalance() - $value);
        } else {
            echo "Saldo insuficiente ou atingiu o limite mensal. Saldo atual R$" . number_format($this->getBalance(), 2, ",", ".") . " <br> Saques utilizados no mês {$this->withdrawLimit}/5 <br>";
        }
    }

    public function getInvestment()
    {
        if(strtotime(date('d-m-Y')) >= strtotime($this->investmentDate))
        {
            $this->setBalance($this->getBalance() + $this->investmentFee($this->getBalance()));
            $this->investmentDate = date('d-m-Y', strtotime('+1 month'));
            $this->withdraw = 0;
            echo "A sua conta rendeu 2% no mês, tendo ficado com R$ {$this->getBalance()}. O proxímo pagamento será em  {$this->investmentDate}<br>";
        }else{
            echo "Sua conta irá render 2% no dia {$this->investmentDate}";
        }
    }

    private function investmentFee($value)
    {
        return $value * 0.02;
    }
}