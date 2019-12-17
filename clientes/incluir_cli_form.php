<link rel="stylesheet" href="../style/style.css">
<div class="container">
    <form action="clientes/incluir_cli.php" method="POST" enctype="multipart/form-data">
    <p>*Nome:</p> <input type="text" name="nome" value="<?=@$nome?>"><br>
    <p>*E-mail:</p> <input type="text" name="email" value="<?=@$email?>"><br>
    <p>*Senha:</p> <input type="password" name="senha" value="<?=@$senha?>"><br>
    <p>Enviar Imagem:</p> <input type="file" name="upload"><br>
    <button class="btn" name="salvar" value="salvar">Salvar</button>
    <button class="btn" name="voltar">Voltar</button>
    <p>*Campos obrigatórios.</p><br>
    <p>**Caso não enviar nenhuma imagem, irá imagem padrão.</p><br>
    </form>
</div>