<head><link rel="stylesheet" href="../style/style.css"></head>
<div class="container">
    <form action="incluir_adm.php" method="post">
    *Nome: <input type="text" name="nome" value="<?=@$nome?>"><br>
    *E-mail: <input type="text" name="email" value="<?=@$email?>"><br>
    *Senha: <input type="password" name="senha" value="<?=@$senha?>"><br>
    <button class="btn" name="salvar" value="salvar">Salvar</button>
    <button class="btn" name="voltar">Voltar</button>
    </form>
</div>