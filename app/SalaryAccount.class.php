<?php
require_once "Account.class.php";

final class SalaryAccount extends Account
{
    final public function deposit($value)
    {
        echo "Esta conta é feita somente para receber salário <br>";
    }
}