<head><link rel="stylesheet" href="../style/style.css"></head>

<?php
// pegar dados
// fazer testes
include_once "../funcoes.php";
$codigo = $_POST['alterar'];
$sql = "SELECT * FROM admin WHERE `admcodig` = ?";
$retorno = fazConsultaSegura($sql, array($codigo));
$senha=$retorno[0]['admsenha'];
$senhaDescriptografada = base64_decode($senha);
?>
<div class="container">
<form action="alterar_adm.php" method="post">
    <input hidden name="codigo" value="<?=$retorno[0]['admcodig']?>">
    *Nome: <input type="text" name="nome" value="<?=$retorno[0]['admnome']?>"><br>
    *E-mail: <input type="text" name="email" value="<?=$retorno[0]['admemail']?>"><br>
    *Senha: <input type="password" name="senha" value="<?=$senhaDescriptografada?>"><br>
    <button class="btn" name="salvar" value="salvar">Salvar</button>
    <button class="btn" name="voltar">Voltar</button>
    </form>
</div>