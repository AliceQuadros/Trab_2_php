<?php
include_once "../funcoes.php";
$codigo = $_POST['codigo']; 

if($_SESSION['admemail'])
{
    if (isset($_POST['voltar']))
    {
        header('Location: ../mostra_adm.php');
    }
}
else
{
    if (isset($_POST['voltar']))
    {
        header('Location: ../home.php');
    }   
}
try
{
    $sql = "delete from clientes where clicodig = ?";
    fazConsultaSegura($sql, array($codigo));
} 
catch ( thrown $error)
{
        echo ($error);
}
    


