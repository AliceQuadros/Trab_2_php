<?php
include_once "../funcoes.php";
if (isset($_POST['voltar']))
{
    header('Location: ../mostra_adm.php');
}
$categoria = $_POST['descricao'];
$sql = "INSERT INTO `categorias` (catdescr) VALUES (?);";
$retorno = fazConsultaSegura($sql, array($categoria));
