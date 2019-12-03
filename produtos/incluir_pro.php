<?php
include_once "../funcoes.php";
$id = 0;
$imagem = $_FILES['upload']['name'];
$nome = $_POST['nome'];
$marca = $_POST['marca'];
$preco = $_POST['preco'];
$categoria = $_POST['categoria'];
if ($imagem == NULL)
{
    $imagem = "0.png";
}
$sql = "INSERT INTO `produtos` (pronome,promarca,procateg,propreco,proimagem) VALUES (?,?,?,?,?);";
$retorno1 = fazConsultaSegura($sql, array($nome,$marca,$categoria,$preco,$imagem), $id);
if ($imagem != "0.png")
{
    include_once "../upload_pro.php";
    $sql = "UPDATE `produtos` SET `proimagem` = ?  WHERE `procodig` = ?";
    $retorno2 = fazConsultaSegura($sql, array($arquivo, $id));
}



    



