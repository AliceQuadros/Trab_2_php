<?php
if (@$_SESSION['pro']) {
?>
	<form class="barra_pesquisa" action="pesquisa/consulta_search.php" method="post" >
	<input class="pesquisa" type="text" name="busca" placeholder="SEM REGISTROS">
	<button type="submit" id = "btn_pesq" class="btn btn_pesquisa" class="btn_pesquisa" name="pesquisar">Pesquisar</button>
	</button>
</form>
<?php
$_SESSION ['pro'] = array();
}
else{

?>
<form class="barra_pesquisa" action="pesquisa/consulta_search.php" method="post" >
	<input class="pesquisa" type="text" name="busca" placeholder="Pesquise aqui">
	<button type="submit" id = "btn_pesq" class="btn btn_pesquisa" class="btn_pesquisa" name="pesquisar">Pesquisar</button>
	</button>
</form>
<?php
}
