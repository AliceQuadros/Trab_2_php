<head><link rel="stylesheet" href="../style/style.css"></head>
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

<button class="btn" ><a class="link" href="../home.php">Voltar</a></button>