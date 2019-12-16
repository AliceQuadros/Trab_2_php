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

$sql = "SELECT `climagem` FROM clientes WHERE `clicodig` = ?";
$retorno = fazConsultaSegura($sql, array($codigo));
$img = $retorno[0]['climagem'];

if($_POST['deletar'])
{
    if ($retorno[0]['climagem'] != "0.png")
    {
       unlink("../upload/" . $img);
    }
    $cu = "0.png";
    $sql = "UPDATE `clientes` SET `clinome` = ?, `cliemail` = ?, `clisenha` = ?, `climagem` = ? WHERE `clicodig` = ?";
    $retorno = fazConsultaSegura($sql, array($nome, $email, $senha, $cu, $codigo));
    header('Location: ../home.php');
    
}
else
{
    header('Location: ../home.php');   
}
if ( $imagem == null)
{
    if ($retorno[0]['climagem'] != "0.png")
    {
        $sql = "UPDATE `clientes` SET `clinome` = ?, `cliemail` = ?, `clisenha` = ? WHERE `clicodig` = ?";
        $retorno = fazConsultaSegura($sql, array($nome, $email, $senha, $codigo));
        header('Location: ../home.php');
    }


}
else
{
    unlink("../upload/" . $img);
    include_once ("../upload.php");   
    $sql = "UPDATE `clientes` SET `clinome` = ?, `cliemail` = ?, `clisenha` = ?, `climagem` = ? WHERE `clicodig` = ?";
    $retorno = fazConsultaSegura($sql, array($nome, $email, $criptografada, $arquivo, $codigo));
     
}


