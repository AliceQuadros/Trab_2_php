<?php
include("conecta.php");
$usuario = $_REQUEST['usucodig'];
$i=0;
$sql = "";
foreach($_REQUEST['codigo'] as $codigo) {
    $quantidade = $_REQUEST['quantidade'][$i++];
	$sql .= "insert into pedidos (clicodig, procodig,pedquant) values ('$usuario','$codigo','$quantidade');";
	$sql .= "UPDATE pedidos JOIN produtos ON produtos.procodig = pedidos.procodig  SET pedidos.pedtotal= produtos.propreco * pedidos.pedquant ;";
}

try {
	$consulta = $link->prepare($sql);
	$consulta->execute();
	echo(json_encode(array("erro"=>"0", "sql" => $sql)));
}
catch(PDOException $ex){
	echo(json_encode(array("erro"=>$ex->getCode(),"mensagem"=>$ex->getMessage())));
}
?>