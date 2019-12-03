<?php
// pegar dados
// fazer testes
include_once "../funcoes.php";
$codigo = $_POST['alterar'];

$sql = "SELECT * FROM produtos WHERE `procodig` = ?";
$retorno = fazConsultaSegura($sql, array($codigo));
?>
<div class="container">
<form action="alterar_pro.php" method="post" enctype="multipart/form-data">
    <input name="codigo" hidden value="<?=$retorno[0]['procodig']?>">
    *Nome: <input type="text" name="nome" value="<?=$retorno[0]['pronome']?>"><br>
    *Marca: <input type="text" name="marca" value="<?=$retorno[0]['promarca']?>"><br>
    *Categoria: <input type="text" name="categoria" value="<?=$retorno[0]['procateg']?>"><br>
    *Preço: <input type="text" name="preco" value="<?=$retorno[0]['propreco']?>"><br>
    Enviar Imagem: <input type="file" name="upload"><br>
    <button type="submit" name="salvar" value="salvar">Salvar</button>
    <button href="mostra_cat.php">Voltar</button>
    <br>
    *Campos obrigatórios.<br>
    **Caso não enviar nenhuma imagem, irá imagem padrão.<br>
    </form>
</div>