<head><link rel="stylesheet" href="../style/style.css"> </head>
<form action="sessao/login.php" method="post">
    <p>*E-mail: </p><input type="text" name="email" value="<?=@$email?>"><br>
    <p>*Senha: </p><input type="text" name="senha" value="<?=@$senha?>"><br>
    <button class="btn" name="entrar" value="entrar">Entrar</button>
    <button class="btn" name="voltar">Voltar</button>
    </form>