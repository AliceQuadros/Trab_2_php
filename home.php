<?php
///////////////////////////////////////////////////////////////// PRODUTOS /////////////////////////////////////////////////////////////////
include_once "funcoes.php";
include_once "header.php";
$sql = "SELECT * FROM `produtos`";
$retorno3 = fazConsultaSegura($sql);

?>
<h2>Produtos</h2>
<!--  -->
<button type="submit" name="comprar" >Comprar</button> 
<?php
foreach ($retorno3 as $item) 
{
    ?>
    
    Produto:<?=$item['pronome'];?>
    Marca:<?=$item['promarca'];?>
    Preço:<?=$item['propreco'];?><br>
    
        <form action="carrinho.html" method="post">
            <input type="number" name="quantidade" min="0" value="<?=$quantidade?>">
            <input hidden name="marca"  value="<?=$marca?>">
            <input hidden name="preco"  value="<?=$preco?>">
        </form>
    <img src="upload_pro/<?= $item['proimagem']; ?>" alt="imagem do post"><hr>
    <?php
}
?>







