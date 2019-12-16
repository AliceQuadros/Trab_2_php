<?php

@session_start(); 
?>
<link rel="stylesheet" href="padroes/normalize.css">
<link rel="stylesheet" href="padroes/reset.css">

    <header class="header">
        <div class="container">
        <div class="header_menu">
            <li><a href="home.php">Home</a></li>
            
            <?php
            if (@$_SESSION['admemail'])
            {
            ?> 
                <li><a href="mostra_adm.php">Administração</a></li> 
                <li><a href="sessao/logout.php">Logout</a></li> 
            <?php   
            }
                if (@$_SESSION['cliemail']) {
            ?>
                <li><a href="carrinho.php">Carrinho</a></li>
                <li><a href="clientes/view_cli.php">Perfil</a></li>
                <li><a href="sessao/logout.php">Logout</a></li>
            <?php
                }else if (@$_SESSION == false){
            ?>
                <li><a href="sessao/login_form.php">Entrar</a></li>
                <li><a href="clientes/incluir_cli_form.php">Criar Conta</a></li>

            <?php
            }
                include_once "pesquisa/pesquisa_form.php";
            ?>
            </div>
        </div>
    </header>
