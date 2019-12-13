<?php
session_start();
include_once "../funcoes.php";
$codigo = $_POST['codigo']; 

if(@$_SESSION['admemail'])
{
    if ($_POST['nao'])
    {
        header('Location: ../mostra_adm.php');
    }
}
else if (@$_SESSION['cliemail'])
{
    if ($_POST['sim'])
    {
        try
{
    $sql = "delete from clientes where clicodig = ?";
    fazConsultaSegura($sql, array($codigo));
} 
catch ( thrown $error)
{
        echo ($error);
}   
        
    } 
    else
    {
        echo'oi';
        header('Location: ../home.php');   
    }
}


    


