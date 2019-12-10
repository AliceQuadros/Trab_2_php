<?php
function geraTRs($matrizColunas){
	foreach ($matrizColunas as $linha) {
		$html = "";
		abreTag("tr");
		foreach ($linha as $dado) {
			$html .= "<td>$dado</td>";
		}
		echo($html);
		fechaTag("tr");
		echo("\n");
	}
}


function abreTag($tag,$vet=array()){
   echo("<$tag");
   if (count($vet) > 0) {
	foreach($vet as $atrib => $valor){
		echo(" $atrib='$valor'");
	}
   
	}
echo(">\n");
}
function fechaTag($tag){
	echo ("</$tag>");
}

?>