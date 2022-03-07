<?php

trait AcoesConta
{
    public function getSaldo()
    {
        echo "Saldo Disponivel: {$this->saldo}";
    }

    public function depositar($valor)
    {
        $this->saldo += $valor;
    }

    public function sacar($valor)
    {
        if ($this->saldo >= $valor) {
            $this->saldo -= $valor;
        }
    }
}