<?php
include_once "../funcoes.php";

$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$criptografada = base64_encode($senha);
if (isset($_POST['voltar']))
{
    header('Location: ../mostra_adm.php');
}

$sql = "UPDATE `admin` SET `admnome` = ?, `admemail` = ?, `admsenha` = ? WHERE `admcodig` = ?";
$retorno = fazConsultaSegura($sql, array($nome, $email,$criptografada,$codigo));
header('Location: ../mostra_adm.php');
