<?php
include_once "../funcoes.php";
$uploadOk = 1;
$id = 0;
$imagem = $_FILES['upload']['name'];
$nome = $_POST['nome'];
$marca = $_POST['marca'];
$preco = $_POST['preco'];
$categoria = $_POST['categoria'];

if (isset($_POST['voltar']))
{
    header('Location: ../mostra_adm.php');
}

@$check = getimagesize($_FILES["upload"]["tmp_name"]);
if(@$check !== false) {
    $uploadOk = 1;
} else {
    $uploadOk = 0;
    echo "Arquivo não é uma imagem.<br>";
}

if($uploadOk == 1)
{
    

    $sql = "INSERT INTO `produtos` (pronome,promarca,procateg,propreco,proimagem) VALUES (?,?,?,?,?);";
    $retorno1 = fazConsultaSegura($sql, array($nome,$marca,$categoria,$preco,$imagem), $id);    
    include_once "../upload_pro.php";
    $sql = "UPDATE `produtos` SET `proimagem` = ?  WHERE `procodig` = ?";
    $retorno2 = fazConsultaSegura($sql, array($arquivo, $id));
}
if($uploadOk == 0)
{
    echo("Ocorreu um erro enviando seu arquivo");
}







    



