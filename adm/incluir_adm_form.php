<div class="container">
    <form action="incluir_adm.php" method="post">
    *Nome: <input type="text" name="nome" value="<?=@$nome?>"><br>
    *E-mail: <input type="text" name="email" value="<?=@$email?>"><br>
    *Senha: <input type="text" name="senha" value="<?=@$senha?>"><br>
    <!-- *Confirmar senha: <input type="text" name="descricao" value=""><br> -->
    <button name="salvar" value="salvar">Salvar</button>
    <button href="mostra_cat.php">Voltar</button>
    </form>
</div>