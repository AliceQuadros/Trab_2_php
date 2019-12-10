<?php
include_once "../funcoes.php";
$codigo = $_POST['codigo']; 

if (isset($_POST['voltar']))
{
    header('Location: ../mostra_adm.php');
}
else{
    $sql = "delete from admin where admcodig = ?";
    fazConsultaSegura($sql, array($codigo));
    
    
}

