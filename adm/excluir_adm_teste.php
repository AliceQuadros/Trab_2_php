<head><link rel="stylesheet" href="../style/style.css"></head>
<?php
$codigo = $_POST['excluir'];
?>
<h3>Tem certeza que deseja excluir o seu cadastro de administrador? </h3>
<form  action='excluir_adm.php' method="post">
	<input type="text" name="codigo" value="<?=$codigo?>" readonly><br>
    <button class="btn" type="submit" name="sim" value="<?=$codigo?>">Sim</button>
    <button class="btn" type="submit" name="voltar" >Não</button> 
</form>