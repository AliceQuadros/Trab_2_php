<?php
include_once "../funcoes.php";
$categoria = $_POST['descricao'];
$sql = "INSERT INTO `categorias` (catdescr) VALUES (?);";
$retorno = fazConsultaSegura($sql, array($categoria));
