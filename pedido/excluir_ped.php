<?php
include_once "../funcoes.php";
$codigo = $_POST['codigo']; 

if(isset($_POST['nao'])){
	
}
else{
    try {
        $sql = "delete from pedidos where pedcodig = ?";
        fazConsultaSegura($sql, array($codigo));
    } catch ( thrown $error) {
        echo ($error);
    }
    
}

