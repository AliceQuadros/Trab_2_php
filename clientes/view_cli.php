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


    
    <?=$item['clinome'];?>
    <?=$item['cliemail'];?>
    <?=$item['clisenha'];?>
    <img src="../upload/<?= $item['climagem']; ?>" alt="imagem do post">
<!-- tirar daqui -->
<!-- arrumar: usuario so pode excluir e alterar o seu proprio cadastro -->
      
    <form action="clientes/alterar_cli_form.php"  method="POST">
        <button type="submit" name="alterar" value="<?= $item['clicodig']; ?>">Alterar</button>
    </form>
 <!--  -->
        <form action="clientes/excluir_cli_teste.php"  method="POST">
            <button type="submit" name="excluir" value="<?= $item['clicodig']; ?>">Excluir</button>
        </form>
        
    <?php

    }
    

}
?>
<button type="submit" name="voltar">Voltar</button>
<?php
if (isset($_POST['voltar']))
{
    header('Location: ../home.php');
}