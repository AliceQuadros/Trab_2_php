<?php
include_once "../funcoes.php";
$uploadOk = 1;
$imagem = $_FILES['upload']['name'];
$codigo = $_POST['codigo'];
$id = $codigo;
$nome = $_POST['nome'];
$marca = $_POST['marca'];
$preco = $_POST['preco'];
$categoria = $_POST['categoria'];

if (isset($_POST['voltar']))
{
 header('Location: ../mostra_adm.php');
}

if ( $imagem == null)
{
    $sql = "UPDATE `produtos` SET `pronome` = ?, `promarca` = ?,  `procateg` = ?,`propreco` = ? WHERE `procodig` = ?";
    $retorno = fazConsultaSegura($sql, array($nome, $marca,$categoria, $preco, $codigo));
    header('Location: ../mostra_adm.php');

}

else
{
    include_once ("../upload_pro.php");  
    $sql = "UPDATE `produtos` SET `pronome` = ?, `promarca` = ?, `procateg` = ?, `propreco` = ?, `proimagem` = ? WHERE `procodig` = ?";
    $retorno = fazConsultaSegura($sql, array($nome, $marca,$categoria, $preco, $arquivo, $codigo));   
}



