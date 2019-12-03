<?php
include_once "../funcoes.php";

$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$criptografada = base64_encode($senha);

$sql = "UPDATE `admin` SET `admnome` = ?, `admemail` = ?, `admsenha` = ? WHERE `admcodig` = ?";
$retorno = fazConsultaSegura($sql, array($nome, $email,$criptografada,$codigo));

// echo("alterado com sucesso de: " . $descricaoantiga . " para: " . $descricao  );
