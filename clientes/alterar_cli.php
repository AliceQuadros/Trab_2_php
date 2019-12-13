<?php
include_once "../funcoes.php";
session_start();
$imagem = $_FILES['upload']['name'];
$codigo = $_POST['codigo'];
$id = $codigo;
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$criptografada = base64_encode($senha);

if(@$_SESSION['admemail'])
{
    if (isset($_POST['voltar']))
    {
        header('Location: ../mostra_adm.php');
    }
}
else if (@$_SESSION['cliemail'])
{
    if (isset($_POST['voltar']))
{
    header('Location: ../home.php');
}
}

if ( $imagem == null)
{
    $sql = "SELECT `climagem` FROM clientes WHERE `clicodig` = ?";
    $retorno = fazConsultaSegura($sql, array($codigo));
    if ($retorno[0]['climagem'] != "0.png")
    {
        $sql = "UPDATE `produtos` SET `pronome` = ?, `promarca` = ?, `propreco` = ? WHERE `procodig` = ?";
        $retorno = fazConsultaSegura($sql, array($nome, $marca, $preco, $codigo));
        header('Location: ../mostra_adm.php');
    }

}
else
{
    include_once ("../upload.php");   
    $sql = "UPDATE `clientes` SET `clinome` = ?, `cliemail` = ?, `clisenha` = ?, `climagem` = ? WHERE `clicodig` = ?";
    $retorno = fazConsultaSegura($sql, array($nome, $email, $criptografada, $arquivo, $codigo));
     
}


