<?php
// require_once "app/CurrentAccount.class.php";
require_once "app/SalaryAccount.class.php";
require_once "app/SavingsAccount.class.php";

$contaFelipe = new SavingsAccount("Felipe");
$contaFelipe->deposit(10000);
// echo $contaFelipe->getBalanceToString();

$contaFelipe->withdrawMoney(300);
$contaFelipe->withdrawMoney(300);
// echo $contaFelipe->getBalanceToString();

// $contaFelipe->getInvestment();

echo "<pre>";
$contaFelipe->getExtract();

