<?php

@session_start(); 
?>

<header>
    <a href="home.php">Home</a>
    
    <?php
    if (@$_SESSION['admemail'])
    {
    ?> 
        <a href="mostra_adm.php">Administração</a>
        <a href="sessao/logout.php">Logout</a>
    <?php   
    }
        if (@$_SESSION['cliemail']) {
    ?>
        <a href="carrinho.php">Carrinho</a>
        <a href="clientes/view_cli.php">Perfil</a>
        <a href="sessao/logout.php">Logout</a>
        
    <?php
        }else if (@$_SESSION == false){
    ?>
    <a href="sessao/login_form.php">Entrar</a>
    <a href="clientes/incluir_cli_form.php">Criar Conta</a>


    <?php
    }
        include_once "pesquisa/pesquisa_form.php";
    ?>

</header>