<head><link rel="stylesheet" href="../style/style.css"> </head>
<form action="login.php" method="post">
    *E-mail: <input type="text" name="email" value="<?=@$email?>"><br>
    *Senha: <input type="text" name="senha" value="<?=@$senha?>"><br>
    <button class="btn" name="entrar" value="entrar">Entrar</button>
    <button class="btn" name="voltar">Voltar</button>
    </form>