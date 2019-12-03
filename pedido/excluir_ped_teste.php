<?php
$codigo = $_POST['excluir'];
?>
<h3>Tem certeza que deseja excluir esse pedido?</h3>
<form  action='excluir_cat.php' method="post">
	<input type="text" name="codigo" value="<?=$codigo?>" readonly><br>
    <button type="submit" name="sim" value="<?=$codigo?>">Sim</button>
    <button type="submit" name="nao" >Não</button> 
</form>