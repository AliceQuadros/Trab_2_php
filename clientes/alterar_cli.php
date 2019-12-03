<?php
include_once "../funcoes.php";

$imagem = $_FILES['upload']['name'];
$codigo = $_POST['codigo'];
$id = $codigo;
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$criptografada = base64_encode($senha);

$sql = "SELECT `climagem` FROM clientes WHERE `clicodig` = ?";
$retorno = fazConsultaSegura($sql, array($codigo));

foreach ($retorno as $item ) 
{   
    if ($item['climagem'] != "0.png")
    {
        unlink("../upload/".$item['climagem']);
    }
}

if ($imagem == NULL)
{
    $arquivo = "0.png";

}
else
{
    include_once ("../upload.php");        
}

$sql = "UPDATE `clientes` SET `clinome` = ?, `cliemail` = ?, `clisenha` = ?, `climagem` = ? WHERE `clicodig` = ?";
$retorno = fazConsultaSegura($sql, array($nome, $email, $criptografada, $arquivo, $codigo));

