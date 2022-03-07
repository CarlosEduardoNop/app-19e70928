<?php

function Teste($value)
{
    $valor = 5000;
    if($value <= $valor){
        return $valor -= $value;
    }else{
        return "Deu erro";
    }
}

function Taxa($value)
{
    return $value * 0.02;
}

$valorretirado = 400;
var_dump(teste($valorretirado - Taxa($valorretirado)));
