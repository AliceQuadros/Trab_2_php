<?php
function fazconexao(){
    $stringDeConexao = 'mysql:host=localhost;charset=utf8;dbname=trab_final_php;';
    $usuario = 'root';
    $senha = '';
    try{
        $link = new PDO($stringDeConexao,$usuario,$senha,
                    array(
                        PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                        PDO::ATTR_PERSISTENT => false
                    )
                );
        return($link);
        } 
    catch(PDOException $ex){
    die($ex->getMessage());
    }

}
function fazConsultaSegura($sql,$parametros=array(),&$id=-1){
    try {
        $conexao = fazConexao();
        $consulta = $conexao->prepare($sql);
        
        if (count($parametros) > 0) { 
            for($i=0;$i<count($parametros); $i++){
                $consulta->bindParam($i+1,$parametros[$i]);
            }
           
        }
        $consulta->execute();
        
        if ($id == 0) {
            $id = $conexao->lastInsertId();
        }

        $resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return($resultados);
    }
    catch (PDOException $e) {
        return($e);
    }
}


function geraSelect($array,$nome,$valor=array()){
    echo("<select name=\"$nome\">");
    for($i=0; $i<count($array); $i++){
        if ($valor == $array[$i]['catcodig']){
            echo("<option value='" .$array[$i]['catcodig'] . "' selected>" . $array[$i]['catdescr'] . "</option>");
        }
        else {
            echo("<option value='" .$array[$i]['catcodig'] . "'>" . $array[$i]['catdescr'] . "</option>");
        }
        
    }
    echo("</select>");
  }