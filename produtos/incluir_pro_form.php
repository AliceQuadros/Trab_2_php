<?php
include_once "../funcoes.php";
$sql = "SELECT * FROM `categorias`";
$retorno = fazConsultaSegura($sql);
print_r($retorno);
$categoria = $_REQUEST['$categoria'];
?>


<div class="container">
    <form action="incluir_pro.php" method="POST" enctype="multipart/form-data">
    *Nome: <input type="text" name="nome" value="<?=@$nome?>"><br>
    *Marca: <input type="text" name="marca" value="<?=@$marca?>"><br>
    *Categoria: <?=geraSelect($retorno,'categoria')?><br>
    *Preço: <input type="text" name="preco" value="<?=@$preco?>"><br>
    Enviar Imagem: <input type="file" name="upload"><br>
    <button type="submit" name="salvar" value="salvar">Salvar</button>
    <button href="mostra_cat.php">Voltar</button>
    <br>
    *Campos obrigatórios.<br>
    **Caso não enviar nenhuma imagem, irá imagem padrão.<br>
    </form>
</div>