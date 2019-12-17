<link rel="stylesheet" href="../style/style.css">
<?php
@session_start();
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
            ?>
            <div class="container"><h2>Itens que você pode estar procurando</h2></div> 
            <?php
            
            if (count($resultado) > 0) {
                
                foreach ($resultado as $item) {
                    ?>
                <div class="container  ">
                <?php
                    include('pro_pesquisado.php');
                    ?>
                </div>
                <?php
                }
                
            }
            
            else {
                $_SESSION['pro'] = 'Sem Registros';
                header('Location: ../home.php');

            }
           ?>
            <div class="container"><button class="btn " type="submit" name="voltar">Voltar</button> </div> 
            <?php
        } else { 
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

