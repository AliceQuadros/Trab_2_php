<?php
$codigo = $_POST['excluir'];
?>
<h3>Tem certeza que deseja excluir o seu cadastro? </h3>
<form  action='excluir_cli.php' method="post">
	<input type="text" name="codigo" value="<?=$codigo?>" readonly><br>
    <button type="submit" name="sim" value="<?=$codigo?>">Sim</button>
    <button type="submit" name="voltar" >Não</button> 
</form>