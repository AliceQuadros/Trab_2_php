<?php

@session_start(); 
?>

<header>
    <a href="">Home</a>
    
    <?php
    if ($_SESSION['admemail'])
    {
    ?> 
        <a href="mostra_adm.php">Administração</a>
    <?php   
    }
        if (@$_SESSION) {
    ?>
        <a href="carrinho.php">Carrinho</a>
        <a href="clientes/view_cli.php">Perfil</a>
        <a href="sessao/logout.php">Logout</a>
    <?php
        }else{
    ?>
    <a href="sessao/login_form.php">Entrar</a>

    <?php
    }
    ?>


</header>