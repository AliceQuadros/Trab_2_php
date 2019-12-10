<?php
include_once "../funcoes.php";
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$criptografada = base64_encode($senha);

if (isset($_POST['voltar']))
{
    header('Location: ../mostra_adm.php');
}

$sql = "INSERT INTO `admin` (admnome,admemail,admsenha) VALUES (?,?,?);";
$retorno = fazConsultaSegura($sql, array($nome,$email,$criptografada));
