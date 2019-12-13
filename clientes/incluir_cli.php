<?php
include_once "../funcoes.php";
session_start();
$id = 0;
$imagem = $_FILES['upload']['name'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$criptografada = base64_encode($senha);
if (isset($_POST['voltar']))
{
 header('Location: ../home.php');
}
if ($imagem == NULL)
{
    $imagem = "0.png";
}

$sql = "INSERT INTO `clientes` (clinome,cliemail,clisenha,climagem) VALUES (?,?,?,?);";
$retorno1 = fazConsultaSegura($sql, array($nome,$email,$criptografada,$imagem), $id);

if ($imagem != "0.png")
{
    include_once "../upload.php";


$sql = "UPDATE `clientes` SET `climagem` = ?  WHERE `clicodig` = ?";
$retorno2 = fazConsultaSegura($sql, array($arquivo, $id));
}
if (@$_SESSION['amdcodig'])
{
    header('Location: ../mostra_adm.php');

}
else
header('Location: ../home.php');



