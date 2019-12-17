<head><link rel="stylesheet" href="../style/style.css"> <link rel="stylesheet" href="../padroes/grid.css"></head>
<?php
///////////////////////////////////////////////////////////////// CLIENTES /////////////////////////////////////////////////////////////////
session_start(); 
include_once "../funcoes.php";
$sql = "SELECT * FROM `clientes`";
$retorno = fazConsultaSegura($sql);
?>
<?php

foreach ($retorno as $item) 
{
    if (@$_SESSION['clicodig'] == $item['clicodig'] )
    {
    ?>    
    <div class="container ">
        <?=$item['clinome'];?><br>
        <?=$item['cliemail'];?><br>
        <img src="../upload/<?= $item['climagem']; ?>" alt="imagem do post">
        <div class="botoes">
            <form action="alterar_cli_form.php"  method="POST">
                <button class="btn" type="submit" name="alterar" value="<?= $item['clicodig']; ?>">Alterar</button>
            </form>
                <form action="excluir_cli_teste.php"  method="POST">
                    <button class="btn" type="submit" name="excluir" value="<?= $item['clicodig']; ?>">Excluir</button>
                </form>
         
    </div>   
    <?php

    }
    

}
?>
<a class="btn link" href="../home.php">Voltar</a>
</div> 

<!-- <script>
    const button = document.createElement('button');
        button.innerText = 'Volta';
     button.addEventListener('click',function(e){
                       header('Location: ../home.php');
                    });
</script> -->
