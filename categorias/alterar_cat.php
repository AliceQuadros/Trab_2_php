<?php
include_once "../funcoes.php";

$codigo = $_POST['codigo'];
$descricaoantiga = $_POST['descricao_antiga'];
$descricao = $_POST['descricao'];

$sql = "UPDATE `categorias` SET `catdescr` = ? WHERE `catcodig` = ?";
$retorno = fazConsultaSegura($sql, array($descricao, $codigo));

echo("alterado com sucesso de: " . $descricaoantiga . " para: " . $descricao  );