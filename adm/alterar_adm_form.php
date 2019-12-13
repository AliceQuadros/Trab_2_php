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
    <input hidden name="codigo" value="<?=$codigo?>">
    *Nome: <input type="text" name="nome" value="<?=@$nome?>"><br>
    *E-mail: <input type="text" name="email" value="<?=@$email?>"><br>
    *Senha: <input type="password" name="senha" value="<?=@$senhaDescriptografada?>"><br>
    <button name="salvar" value="salvar">Salvar</button>
    <button name="voltar">Voltar</button>
    </form>
</div>