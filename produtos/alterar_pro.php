<?php
include_once "../funcoes.php";
$uploadOk = 1;
$imagem = $_FILES['upload']['name'];
$codigo = $_POST['codigo'];
$id = $codigo;
$nome = $_POST['nome'];
$marca = $_POST['marca'];
$preco = $_POST['preco'];
$categoria = $_POST['categoria'];

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["upload"]["tmp_name"]);
    if($check !== false) {
        echo "Arquivo é uma imagem válida - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        echo "Arquivo não é uma imagem.<br>";
        $uploadOk = 0;
    }
}

if($uploadOk == 1)
{
    include_once ("../upload_pro.php");     

}


$sql = "UPDATE `produtos` SET `pronome` = ?, `promarca` = ?, `propreco` = ?, `proimagem` = ? WHERE `procodig` = ?";
$retorno = fazConsultaSegura($sql, array($nome, $marca, $preco, $arquivo, $codigo));

