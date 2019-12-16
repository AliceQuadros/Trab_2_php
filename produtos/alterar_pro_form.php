<head><link rel="stylesheet" href="../style/style.css"></head>
<?php
// pegar dados
// fazer testes
include_once "../funcoes.php";
$codigo = $_POST['alterar'];

$sql = "SELECT * FROM produtos WHERE `procodig` = ?";
$retorno = fazConsultaSegura($sql, array($codigo));
$sql = "SELECT * FROM `categorias`";
$retorno2 = fazConsultaSegura($sql);
@$categoria = $_REQUEST['$categoria'];
?>
<div class="container">
<form action="alterar_pro.php" method="post" enctype="multipart/form-data">
    <input name="codigo" hidden value="<?=$retorno[0]['procodig']?>">
    *Nome: <input type="text" name="nome" value="<?=$retorno[0]['pronome']?>"><br>
    *Marca: <input type="text" name="marca" value="<?=$retorno[0]['promarca']?>"><br>
    *Categoria:<?=geraSelect($retorno2,'categoria')?><br>
    *Preço: <input type="text" name="preco" value="<?=$retorno[0]['propreco']?>"><br>
    *Enviar Imagem: <input type="file" name="upload"><br>
    <button class="btn" type="submit" name="salvar" value="salvar">Salvar</button>
    <button class="btn" name="voltar">Voltar</button>
    <br>
    *Campos obrigatórios.<br>
    </form>
</div>
<?
echo$categoria;