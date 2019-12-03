<?php
///////////////////////////////////////////////////////////////// PRODUTOS /////////////////////////////////////////////////////////////////
include_once "funcoes.php";
include_once "header.php";
$sql = "SELECT * FROM `produtos`";
$retorno3 = fazConsultaSegura($sql);

?>
<h2>Produtos</h2>
<!--  -->
<?php
foreach ($retorno3 as $item) 
{
    ?>
    
    Produto:<?=$item['pronome'];?>
    Marca:<?=$item['promarca'];?>
    Preço:<?=$item['propreco'];?><br>
    <form action="carrinho.php" method="post">
        <input type="number" name="quantidade" min="0" value="<?=$quantidade?>">
    </form>
    <img src="upload_pro/<?= $item['proimagem']; ?>" alt="imagem do post"><hr>
    <?php
}




