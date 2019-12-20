<?php
session_start();
include_once "../funcoes.php";
$codigo = $_POST['codigo']; 

if(@$_SESSION['admemail'])
{
    if (@$_POST['nao'])
    {
        header('Location: ../mostra_adm.php');
    }
}
// if (@$_SESSION['cliemail'])
// {

    if($_POST['nao'])
    {
        header('Location: ../home.php');   
    }
    else{
        $sql = "delete from clientes where clicodig = ?";
        $retorno=fazConsultaSegura($sql, array($codigo));
        header('Location: ../home.php'); 
    }


// }
    


