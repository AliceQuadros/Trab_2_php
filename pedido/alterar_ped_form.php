<?php
$codigo = $_POST['alterar'];
$descricao = '';
$descricaoantiga = $_POST['descricao_antiga']
?>
<div class="container">
    <form action="alterar_cat.php" method="post">
    Código: <input type="text" name="codigo" value="<?=$codigo?>" readonly>
    *Descrição: <input type="text" name="descricao">
    <input hidden name="descricao_antiga" value="<?=$descricaoantiga;?>">
    <button name="salvar" value="salvar">Salvar</button>
    <button href="mostra_cat.php">Voltar</button>
    </form>
</div>