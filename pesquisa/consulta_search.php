<?php
include_once "../funcoes.php";
@$busca = trim($_POST['busca']);

if (strlen($busca) == 0) {
    header('Location: ../home.php');
}
if (isset($_POST['pesquisar'])) {
    if ($_POST['busca']) {

        @$busca = trim($_POST['busca']);

        if ((strlen($busca) > 0)){

            $sql = "select * from produtos where pronome LIKE ?";
            $busca = "$busca" . "%";
            $vetorPars = array($busca);
            $resultado = fazConsultaSegura($sql, $vetorPars);
        }

        if (is_array(@$resultado) && $busca != '') {

            if (count($resultado) > 0) {

                foreach ($resultado as $item) {
                    include('pro_pesquisado.php');
                }
            } else {

                echo"sem registros";
            }
        } else { //caso contrário mostra o erro retornado
            echo ("<pre>");
            print_r(@$resultado);
            echo ("</pre>");
        }
    }
}













// $busca = trim($_POST['busca']);
// if (strlen($busca) > 0) {
//     $sql = "select * from produtos where pronome LIKE ?";
//     $busca = "$busca" . "%";
//     $vetorPars = array($busca);
//     $resultado = fazConsultaSegura($sql, $vetorPars);
//     echo"oi";

// }

// if (is_array(@$resultado) && $busca != '') {

//     if (count($resultado) > 0) {
//         foreach ($resultado as $item) {
//             include('pro_pesquisado.php');
//         }
//     } else {
//         echo ("Nenhum registro encontrado");
//     }
// }
// else { 
//     echo ("<pre>");
//     print_r(@$resultado);
//     echo ("</pre>");
// }

