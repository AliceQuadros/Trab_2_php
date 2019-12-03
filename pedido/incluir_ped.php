<?php
include_once "../funcoes.php";

$total = 0;
$clicodigo =
$procodigo = 
$pre 


foreach ($pedidos as $pedido) {
    $total= $total + $pedido['preco'];
}


$sql = "INSERT INTO `pedidos` (clicodig, procodig, propreco, pedquant, pedtotal ) VALUES (?,?,?,?,?);";
$retorno = fazConsultaSegura($sql, array($));
