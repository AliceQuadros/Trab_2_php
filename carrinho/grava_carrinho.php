<?php
//inclui o arquivo de conexao
include("conecta.php");
$usuario = $_REQUEST['usucodig'];
// $data = date("Y-m-d h:i:s",time());


$i=0;
$sql = "";
//monta multiplas consultas para inserir no banco cada item do carrinho
foreach($_REQUEST['codigo'] as $codigo) {
    $quantidade = $_REQUEST['quantidade'][$i++];
    $sql .= "insert into pedidos (clicodig, procodig,pedquant) values (6,99,5);";
}
try {
	//$link foi criado no conecta.php
	//cria $consulta que é o objeto de consulta ao banco
	$consulta = $link->prepare($sql);
	//executa a consulta ao banco
	$consulta->execute();
	//tudo ok, retorna um json com o campo "erro" = 0 (não deu erro)
	echo(json_encode(array("erro"=>"0")));
}
catch(PDOException $ex){
	//retorna um objeto json com codigo do erro do banco e a mensagem do erro
	echo(json_encode(array("erro"=>$ex->getCode(),"mensagem"=>$ex->getMessage())));
}
?>