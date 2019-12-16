<head><link rel="stylesheet" href="../style/style.css"></head>
<?php
include_once "../funcoes.php";
$sql = "SELECT * FROM `categorias`";
$retorno = fazConsultaSegura($sql);
@$categoria = $_REQUEST['$categoria'];
?>


<div class="container">
    <form action="incluir_pro.php" method="POST" enctype="multipart/form-data">
    *Nome: <input type="text" name="nome" value="<?=@$nome?>"><br>
    *Marca: <input type="text" name="marca" value="<?=@$marca?>"><br>
    *Categoria: <?=geraSelect($retorno,'categoria')?><br>
    *Preço: <input type="text" name="preco" value="<?=@$preco?>"><br>
    *Enviar Imagem: <input type="file" name="upload"><br>
    <button class="btn" type="submit" name="salvar" value="salvar">Salvar</button>
    <button class="btn" name="voltar">Voltar</button>
    <br>
    *Campos obrigatórios.<br>
    </form>
</div>