<?php
include_once "../funcoes.php";

$codigo = $_POST['codigo'];
$descricaoantiga = $_POST['descricao_antiga'];
$descricao = $_POST['descricao'];
if (isset($_POST['voltar']))
{
    header('Location: ../mostra_adm.php');
}

$sql = "UPDATE `categorias` SET `catdescr` = ? WHERE `catcodig` = ?";
$retorno = fazConsultaSegura($sql, array($descricao, $codigo));

header('Location: ../mostra_adm.php');

