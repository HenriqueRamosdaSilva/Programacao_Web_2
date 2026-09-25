<?php
require_once 'funcaoCalcularTotal.php';

$total1 = calcularTotal(100, 2);
$total2 = calcularTotal(50, 4);
$total = $total1 + $total2;
echo $total;
//passou a pertencer a função a responsabilidade de fazer todos os calculos de total. 