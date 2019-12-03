<?php
include_once "../funcoes.php";
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$criptografada = base64_encode($senha);

$sql = "INSERT INTO `admin` (admnome,admemail,admsenha) VALUES (?,?,?);";
$retorno = fazConsultaSegura($sql, array($nome,$email,$criptografada));
