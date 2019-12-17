<head>
        <script src="jquery-3.4.1.min.js"></script>
</head>
<?php
session_start();
include_once "header.php";
if (@$_SESSION['amdcodig'])
{
    echo"você não pode comprar como adiministrador!";
}
   if (@$_SESSION['clicodig'])
{

?>
        <div class="container margem">
                <h1>Produtos</h1>
                <div id="lista">
                    ..
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
    
    <head>
        <meta charset="utf-8">
        <script src="jquery-3.4.1.min.js"></script>
    </head>
    
    <div class="container margem ">

        <h1>Produtos</h1>
            
    <?php
    foreach ($retorno as $item) 
    {
        ?>
            <div class="grid-4 card ">
                <?=$item['pronome'];?>
                <?=$item['promarca'];?>
                <?=$item['propreco'];?>
                <img class="img" src="upload_pro/<?= $item['proimagem']; ?>">
            </div>
    <?php
    }
   ?>
    </div>

   <?php
}
?>
        


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
                                    alert("Compra concluída com sucesso!");
                                    var lis = document.querySelectorAll('#carrinho li');
                                    for(var i=0; li=lis[i]; i++) {
                                        li.parentNode.removeChild(li);
                                    }
                                    
                                }
                                else {
                                    saida.innerText  =  "Ocorreu um erro ao finalizar a compra";
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
                        img.src = `upload_pro/${objJSON[i].proimagem}`;
                        const text = criaElemento('p');
                        const text2 = criaElemento('p');
                        botao.setAttribute('class','btn');
                        img.setAttribute('class','img');
                        li.setAttribute('class','grid-6 card');                   
                        botao.addEventListener('click',function(e){
                        e.preventDefault;
                        poeNoCarrinho(this.parentElement);
                    });
                  
                            li.appendChild(text);
                            text.innerText = `${decodeURI(objJSON[i].pronome)}  -  ${decodeURI(objJSON[i].promarca)}`;
                            li.appendChild(input);
                            li.appendChild(img);
                            li.appendChild(text2);
                            text2.innerText=` R$:${decodeURI(objJSON[i].propreco)}`;
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
                botaoExcluir.setAttribute('class','btn');



                // const botaoAdd = document.createElement("button");
                // botaoAdd.innerText = "+";
                // botaoAdd.addEventListener('click',function(e,cod){
                //     const liCar = document.getElementById(`liaux${cod}`);
                //     const input = liCar.getElementsByTagName("input")[1];
                //     input.value = parseInt(input.value) + 1;
                // });
                // liAux.appendedChild(botaoAdd);



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