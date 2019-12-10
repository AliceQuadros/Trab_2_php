<?php
include_once "../funcoes.php";
$codigo = $_POST['codigo']; 

if (isset($_POST['voltar']))
{
    header('Location: ../mostra_adm.php');
}
else{
    try {
        $sql = "delete from produtos where procodig = ?";
        fazConsultaSegura($sql, array($codigo));
    } catch ( thrown $error) {
        echo ($error);
    }
    
}

