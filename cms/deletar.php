<?php
    require_once('../bd/conexao.php');

    $conexao = conexaoMysql();

    if (isset($_GET['mod']) == 'deletar') {
        $cod = $_GET['cod'];
        $deletar = 'delete from tblcontato where id=' . $cod;

        if (mysqli_query($conexao, $deletar)) {
            header('location: fale_cms.php');
        }
        else {
            define("ERROR_DELET", "ERRO ao apagar a informação!.");
            echo(define);
        }
    }
?>