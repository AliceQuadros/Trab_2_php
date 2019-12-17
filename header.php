<?php
@session_start(); 
?>
<link rel="stylesheet" href="padroes/normalize.css">
<link rel="stylesheet" href="padroes/reset.css">
<link rel="stylesheet" href="padroes/grid.css">
<link rel="stylesheet" href="style/style.css">


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
                    $cod = @$_SESSION['clicodig'];

            ?>
            <li><a href="clientes/view_cli.php">Perfil</a></li>
            <li><a id="myBtn">Carrinho</a></li>
                </div>
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                            <div class="container" class="grid-6">
                                <h2>Carrinho de produtos:</h2>
                                <button class="btn" id="btfim">Finalizar compra</button>
                                <div id="saida">
                        
                                </div>  
                                <div>
                                    <form id="form1">
                                        <input hidden type="text" name="usucodig" size="2" value="<?=$cod?>">
                                        <ul id="carrinho">
                                            
                                            </ul>
                                        </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header_menu">

                <li><a href="sessao/logout.php">Logout</a></li>
            <?php
                }else if (@$_SESSION == false){
            ?>


                <li><a id="myBtn">Entrar/Cadastar</a></li>
                </div>
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <div class="container ">
                            <div class="login">
                                <div class="logar grid-8 ">
                                <h3>Caso já tenha cadastro, faça login!</h3>
                                <?php
                                include_once "sessao/login_form.php";
                                ?>
                                </div>
                                <div class="cadastrar grid-8">
                                <h3>Cadastre-se!</h3>
                                <?php
                                include_once "clientes/incluir_cli_form.php"
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


         <!-- <div class="header_menu">
                
                <li><a id="myBtn">Criar Conta</a></li>
                </div>
                <div id="myModal" class="modal">
                <div class="modal-content">
                <span class="close">&times;</span>
                <div class="container">
                    <h2>Carrinho de produtos:</h2>
                    <div>
                        <ul id="carrinho">

                        </ul>
                        </form>
                        <button id="btfim">Finalizar compra</button>
                        <div id="saida">
            
                        </div>  
                    </div>
                    </div>
                </div>
                </div> -->

            <?php
            }
                include_once "pesquisa/pesquisa_form.php";
                
            ?> 
            </div> 
        </div>
    </header>
    <script>



// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>