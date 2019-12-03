<?php
include_once "../funcoes.php";
$codigo = $_POST['codigo']; 

if(isset($_POST['nao'])){
	
}
else{
    $sql = "delete from admin where admcodig = ?";
    fazConsultaSegura($sql, array($codigo));
    
    
}

