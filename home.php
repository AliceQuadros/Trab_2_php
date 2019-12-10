<?php
include_once "header.php";
$cod = $_SESSION['clicodig'];
?>
<html>
    <head>
        <meta charset="utf-8">
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
                Código do usuário(cliente): <input type="text" name="usucodig" size="2" value="<?=$cod?>">
            <ul id="carrinho">

            </ul>
            </form>
            <button id="btfim">Finalizar compra</button>
            <div id="saida">
                    
            </div>  
        </div>
        <script>
            //executa após a página terminar de carregar!
            $(function(){
                const destino = 'carrinho';
                const origem = 'lista';
                const saida  = document.getElementById('saida');
                const ul = document.getElementById(origem);
                const ulDest = document.getElementById(destino);
                //carrega a lista de produtos quando a página estiver pronta
                
                carregaLista();

                //click do botao finaliza compra
                $('#btfim').bind( "click", function(evt) {
                    //só grava se tiver produtos no carrinho
                    const qtdCarrinho = document.getElementById('carrinho').children.length;
                    if (qtdCarrinho > 0) {
                        $.post( "carrinho/grava_carrinho.php", $('#form1').serialize())
                            .done(function( data ) {
                                console.log(data);
                                //transfoma os dados vindos do PHP em objeto JSON
                                var resposta = JSON.parse(data);
                                //testa se houve erro na gravaçao (resposta.erro != 0)
                                if (resposta.erro == "0") {
                                    saida.innerText ="incluído com sucesso!";
                                    
                                }
                                else {
                                    //dá mensagem se houve erro gravando
                                    saida.innerText  =  "erro gravando";
                                }
                            });
                        }
                        else {
                            saida.innerText  =  "carrinho está vazio!";
                        }
                     });
                     
              

        ///funcao para carregar lista de produtos
        function carregaLista(){
            //remove todo conteúdo da lista
            ul.innerHTML = '';
            //carrega dados dos produtos em JSON
            $.get( "carrinho/consulta.php", function( dados ) {
               
                var objJSON = JSON.parse(dados);
                //pega cada um dos itens do JSON 
                for (var i in objJSON){
                    //a funcao criaElemento está definida no final do script
                    //cria uma variável contendo um elemento LI
                    let li = criaElemento('li',{id:`bt${objJSON[i].procodig}`});
                        
                    //ela serve para criar um elemento no DOM já com seus atributos!
                    //cria uma um campo oculto que conterá o codigo
                    let input = criaElemento('input',{type:'hidden',value:objJSON[i].procodig,name:'codigo[]'});
                    
                    //botao para adicionar ao carrinho
                    let botao = criaElemento('button');
                    botao.innerText = '+';
                    
                    //cria o botao adicionar ao carrinho
                    botao.addEventListener('click',function(e){
                        e.preventDefault;
                        //passa o pai do botao (li) como parametro para a funcao poeNoCarrinho
                        poeNoCarrinho(this.parentElement);
                    });
                    
                    //coloca os dados do objeto JSON no texto entre <li> </li>
                    //decodeURI acert a acentuacao dos dados 
                    li.innerText = ` ${objJSON[i].procodig}  ${decodeURI(objJSON[i].pronome)}  -  ${decodeURI(objJSON[i].promarca)}`;
                    //coloca o campo hidden na lista 
                    li.appendChild(input);
                    //coloca o botao na lista
                    li.appendChild(botao);
                    //adiciona a nova lista <li> na <ul>
                    ul.appendChild(li);
                }
              
             });
            }

        ////////////////
        function poeNoCarrinho(li){
            //pega os valores do codigo do item a ser criado na li 
            cod = li.id;

            //procura o item na lista destino.
            // //se não encontrar adiciona
            if (document.getElementById(`liaux${cod}`) === null) {
                //clona o li da lista origek para a destino
                const liAux = li.cloneNode(true);
                //muda o id da li clonada
                liAux.id = `liaux${cod}`;
              
                //remove o botao + do clone
                const bt = liAux.getElementsByTagName("button")[0];
                liAux.removeChild(bt);

                //caixa de texto para quantidade
                const input = criaElemento('input',{type:'text',size:'2',value:'1',name:'quantidade[]'})
                const botaoExcluir = document.createElement("button");
                botaoExcluir.innerText = 'X';
                 //cria o botao remover do carrinho
                 botaoExcluir.addEventListener('click',function(e){
                            this.parentElement.parentElement.removeChild(liAux);
                });
                liAux.appendChild(input);
                liAux.appendChild(botaoExcluir);
                ulDest.appendChild(liAux);
            }
            else {
                //caso elemento já exista, soma valor na quantidade
                const liCar = document.getElementById(`liaux${cod}`);
                const input = liCar.getElementsByTagName("input")[1];
            
                //incrementa quantidade do produto no carrinho
                input.value = parseInt(input.value) + 1;
            }
        }



        //funcao para criar um novo elemento no dom já com atributos
        var criaElemento = function(type, props) {
            const $e = document.createElement(type);

            for (var prop in props) {
                $e.setAttribute(prop, props[prop]);
            }

            return $e;
        }
    });
        </script>
    </body>
</html>