<?php

// imagem para qd edstá logado
session_start();
include_once "header.php";
$cod = @$_SESSION['clicodig'];
if (@$_SESSION['amdcodig'])
{
    echo"você não pode comprar como adiministrador!";
}
if (@$_SESSION['clicodig'])
{

?>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="padroes/normalize.css">
	    <link rel="stylesheet" href="padroes/reset.css">
	    <link rel="stylesheet" href="padroes/grid.css">
	    <link rel="stylesheet" href="css/style.css">
        <script src="jquery-3.4.1.min.js"></script>
    </head>
    <body>
        <h1>Produtos</h1>
            <div id="lista">
                ...
            </div>    
        <hr>

        <h2>Carrinho de produtos:</h2>
        <div>
            <form id="form1">
                Código do usuário: <input type="text" name="usucodig" size="2" value="<?=$cod?>">
            <ul id="carrinho">

            </ul>
            </form>
            <button id="btfim">Finalizar compra</button>
            <div id="saida">
                    
            </div>  
        </div>
        <?php
    }
else
{
    include_once "funcoes.php";
    $sql = "SELECT * FROM produtos";
    $retorno = fazConsultaSegura($sql);
    ?>
    <html>
    <head>
        <meta charset="utf-8">
        <script src="jquery-3.4.1.min.js"></script>
    </head>
    <body>
        <h1>Produtos</h1>
            
<?php
foreach ($retorno as $item) 
{
    ?>
    
    <?=$item['pronome'];?>
    <?=$item['promarca'];?>
    <?=$item['propreco'];?>
    <img src="upload_pro/<?= $item['proimagem']; ?>" alt="imagem do post">
 
<?php
}
}
?>
        <hr>


        <script>
            $(function(){
                const destino = 'carrinho';
                const origem = 'lista';
                const saida  = document.getElementById('saida');
                const ul = document.getElementById(origem);
                const ulDest = document.getElementById(destino);
                
                carregaLista();

                $('#btfim').bind( "click", function(evt) {
                    const qtdCarrinho = document.getElementById('carrinho').children.length;
                    if (qtdCarrinho > 0) {
                        $.post( "carrinho/grava_carrinho.php", $('#form1').serialize())
                            .done(function( data ) {
                                console.log(data);
                                var resposta = JSON.parse(data);
                                if (resposta.erro == "0") {
                                    saida.innerText ="incluído com sucesso!";
                                    
                                }
                                else {
                                    saida.innerText  =  "erro gravando";
                                }
                            });
                        }
                        else {
                            saida.innerText  =  "carrinho está vazio!";
                        }
                     });
                     
              

        function carregaLista(){
            ul.innerHTML = '';
            $.get( "carrinho/consulta.php", function( dados ) {
               
                var objJSON = JSON.parse(dados);
                for (var i in objJSON){
                    let li = criaElemento('li',{id:`bt${objJSON[i].procodig}`});
                        
                    let input = criaElemento('input',{type:'hidden',value:objJSON[i].procodig,name:'codigo[]'});
                        let botao = criaElemento('button');
                        botao.innerText = '+';
                        let img = criaElemento('img');
                        img.innerText = '<img scr="upload/0.png">';
                        
                    
                    botao.addEventListener('click',function(e){
                        e.preventDefault;
                        poeNoCarrinho(this.parentElement);
                    });
                    
                    li.innerText = ` ${objJSON[i].procodig}  ${decodeURI(objJSON[i].pronome)}  -  ${decodeURI(objJSON[i].promarca)}`;
                    li.appendChild(input);
                    li.appendChild(botao);
                    ul.appendChild(li);
                }
              
             });
            }

        ////////////////
        function poeNoCarrinho(li){
            cod = li.id;

            if (document.getElementById(`liaux${cod}`) === null) {
                const liAux = li.cloneNode(true);
                liAux.id = `liaux${cod}`;
              
                const bt = liAux.getElementsByTagName("button")[0];
                liAux.removeChild(bt);

                const input = criaElemento('input',{type:'text',size:'2',value:'1',name:'quantidade[]'})
                const botaoExcluir = document.createElement("button");
                botaoExcluir.innerText = 'X';
                 botaoExcluir.addEventListener('click',function(e){
                            this.parentElement.parentElement.removeChild(liAux);
                });
                liAux.appendChild(input);
                liAux.appendChild(botaoExcluir);
                ulDest.appendChild(liAux);
            }
            else {
                const liCar = document.getElementById(`liaux${cod}`);
                const input = liCar.getElementsByTagName("input")[1];
            
                input.value = parseInt(input.value) + 1;
            }
        }



        var criaElemento = function(type, props) {
            const $e = document.createElement(type);

            for (var prop in props) {
                $e.setAttribute(prop, props[prop]);
            }

            return $e;
        }
    });
        </script>