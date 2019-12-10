<?php
session_start(); 
include_once "../funcoes.php";

@$email = $_POST['email'];
@$senha = $_POST['senha'];
@$criptografada = base64_encode($senha);
if (isset($_POST['voltar']))
{
    header('Location: ../home.php');
}
///////////////////////////////////////////////////////////////// CLIENTES /////////////////////////////////////////////////////////////////
$sql = "SELECT * FROM `clientes`";
$retornocli = fazConsultaSegura($sql);

foreach ($retornocli as $itemcli) 
{
    if (($email == $itemcli['cliemail']) and ($criptografada == $itemcli['clisenha']))
    {
        $_SESSION['cliemail'] = $email;
        $_SESSION['clicodig'] = $itemcli['clicodig'];
        echo("logado com sucesso");
        
    }
   
}
//////////////////////////////////////////////////////////////////ADMIN/////////////////////////////////////////////////////////////////
$sql = "SELECT * FROM `admin`";
        $retornoadm = fazConsultaSegura($sql);

        foreach ($retornoadm as $itemadm ) 
        {                                          
            if (($email == $itemadm['admemail']) and ($criptografada == $itemadm['admsenha'])) 
            {
                $_SESSION['admemail'] = $email;
                echo("logado com sucesso");
                
            }  
        }

        if ($_SESSION == null) 
    {
        echo("Usuário ou Senha Inválido(s)");
        include("login_form.php");
    }

var_dump($_SESSION);
  
        



   

?>