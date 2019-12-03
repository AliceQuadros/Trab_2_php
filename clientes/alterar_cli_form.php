<?php
// pegar dados
// fazer testes
include_once "../funcoes.php";
$codigo = $_POST['alterar'];

$sql = "SELECT * FROM clientes WHERE `clicodig` = ?";
$retorno = fazConsultaSegura($sql, array($codigo));
$senha=$retorno[0]['clisenha'];
$senhaDescriptografada = base64_decode($senha);
?>
<div class="container">
<form action="alterar_cli.php" method="post" enctype="multipart/form-data">
    <input name="codigo" hidden value="<?=$retorno[0]['clicodig']?>">
    *Nome: <input type="text" name="nome" value="<?=$retorno[0]['clinome']?>"><br>
    *E-mail: <input type="text" name="email" value="<?=$retorno[0]['cliemail']?>"><br>
    *Senha: <input type="text" name="senha" value="<?=$senhaDescriptografada?>"><br>
    **Enviar Imagem:<input type="file" name="upload"><br>
    Imagem Antiga:<br> <img src="../upload/<?=$retorno[0]['climagem']?>"><br>
    <button name="salvar" value="salvar">Salvar</button>
    <button href="mostra_cat.php">Voltar</button>
    <br>
    *Campos obrigatórios.<br>
    **Caso não enviar nenhuma imagem, irá imagem padrão.<br>
    </form>
</div>