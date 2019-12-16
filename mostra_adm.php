<?php
session_start(); 
include_once "funcoes.php";
include_once "header.php";
?>
<!-- <head>
    <link rel="stylesheet" href="padroes/normalize.css">
    <link rel="stylesheet" href="padroes/reset.css">
    <link rel="stylesheet" href="padroes/grid.css">
    <link rel="stylesheet" href="css/style.css">
</head> -->
<?php
//////////////////////////////////////////////////////////////////ADMIN/////////////////////////////////////////////////////////////////
if (@$_SESSION['admemail'])
{
    ?>
    
    <h2>Administradores</h2>
    <form action="adm/incluir_adm_form.php"  method="POST">
    <button type="submit" name="incluir">Novo administrador</button><br>
    </form>
    <?php
    $sql = "SELECT * FROM `admin`";
    $retorno1 = fazConsultaSegura($sql);
    foreach ($retorno1 as $item) 
    {
        ?>
        <?=$item['admnome'];?><br>
        <?=$item['admemail'];?><br>
            <form action="adm/alterar_adm_form.php"  method="POST">
                <button type="submit" name="alterar" value="<?= $item['admcodig']; ?>">Alterar</button>
            </form>
            <form action="adm/excluir_adm_teste.php"  method="POST">
                <button type="submit" name="excluir" value="<?= $item['admcodig']; ?>">Excluir</button>
            </form>
            
        <?php
        
    }

?>
<!--///////////////////////////////////////////////////////////////// CATEGORIAS/////////////////////////////////////////////////////////////////-->
<hr>
<h2>Categorias</h2>
<form action="categorias/incluir_cat_form.php"  method="POST">
<button type="submit" name="incluir">Nova Categoria</button><br>
</form>
<?php
$sql = "SELECT * FROM `categorias`";
$retorno2 = fazConsultaSegura($sql);
foreach ($retorno2 as $item) 
{
    ?>
    <?=$item['catdescr'];?>
        <form action="categorias/alterar_cat_form.php"  method="POST">
            <button type="submit" name="alterar" value="<?= $item['catcodig']; ?>">Alterar</button>
            <input hidden name="descricao_antiga" value="<?=$item['catdescr'];?>">
        </form>
        <form action="categorias/excluir_cat_teste.php"  method="POST">
            <button type="submit" name="excluir" value="<?= $item['catcodig']; ?>">Excluir</button>
        </form>
        
    <?php
    
}
///////////////////////////////////////////////////////////////// PRODUTOS /////////////////////////////////////////////////////////////////
$sql = "SELECT * FROM `produtos`";
$retorno3 = fazConsultaSegura($sql);

?>
<hr>
<h2>Produtos</h2>
<form action="produtos/incluir_pro_form.php"  method="POST">
<button type="submit" name="incluir">Novo Produto</button><br>
</form>
<?php
foreach ($retorno3 as $item) 
{
    ?>
    
    <?=$item['pronome'];?><br>
    <?=$item['promarca'];?><br>
    <?=$item['propreco'];?><br>
    <img src="upload_pro/<?= $item['proimagem']; ?>" alt="imagem do post">
 
    
<form action="produtos/alterar_pro_form.php"  method="POST">
    <button type="submit" name="alterar" value="<?= $item['procodig']; ?>">Alterar</button>
</form>
        <form action="produtos/excluir_pro_teste.php"  method="POST">
            <button type="submit" name="excluir" value="<?= $item['procodig']; ?>">Excluir</button>
        </form>
        
    <?php
    
}


///////////////////////////////////////////////////////////////// CLIENTES /////////////////////////////////////////////////////////////////
$sql = "SELECT * FROM `clientes`";
$retorno3 = fazConsultaSegura($sql);

?>
<hr>
<h2>Usuários</h2>
<form action="clientes/incluir_cli_form.php"  method="POST">
<button type="submit" name="incluir">Novo Usuário</button><br>
</form>
<?php
foreach ($retorno3 as $item) 
{
    ?>
    
    <?=$item['clinome'];?><br>
    <?=$item['cliemail'];?><br>
    <img src="upload/<?= $item['climagem']; ?>" alt="imagem do post">
        <form action="clientes/excluir_cli_teste.php"  method="POST">
            <button type="submit" name="excluir" value="<?= $item['clicodig']; ?>">Excluir</button>
        </form>
        
    <?php

}

}
else
{
    echo"Você não é um administrador!<br>";
    echo"Página somente para administradores.";
}
