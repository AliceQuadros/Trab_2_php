<div class="container">
    <form action="incluir_cli.php" method="POST" enctype="multipart/form-data">
    *Nome: <input type="text" name="nome" value="<?=@$nome?>"><br>
    *E-mail: <input type="text" name="email" value="<?=@$email?>"><br>
    *Senha: <input type="text" name="senha" value="<?=@$senha?>"><br>
    Enviar Imagem: <input type="file" name="upload"><br>
    <button name="salvar" value="salvar">Salvar</button>
    <button name="voltar">Voltar</button>
    *Campos obrigatórios.<br>
    **Caso não enviar nenhuma imagem, irá imagem padrão.<br>
    </form>
</div>