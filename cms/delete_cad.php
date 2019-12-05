<?php
    // Estabelece a conexão com o BD
    require_once('../bd/conexao.php');

    // Faz a conexão com o BD
    $conexao = conexaoMysql();

    $delete = (string)  $_GET['mod'];

    if ($delete == 'deletarCad') {
        $id = $_GET['cod'];

        echo($_GET['mod']);
        $deletar = 'delete from tbl_nv where id ='.$id; 

        if (mysqli_query($conexao, $deletar)) {
            header('location: nivel_users.php');
        }
        else {
            define("ERROR_DELET", "ERRO ao apagar a informação!.");
            echo(ERROR_DELET);
        }
    }

    if ($delete == 'deletarUser') {
        $id = $_GET['cod'];

        $deletar = 'delete from tbl_usuario where id ='.$id; 

        if (mysqli_query($conexao, $deletar)) {
            header('location: adm.php');
        }
        else {
            define("ERROR_DELET", "ERRO ao apagar a informação!.");
            echo(ERROR_DELET);
        }
    }

    /* Apagar CURIOSIDADES */
    if ($delete == 'deletarCuriosidade') {
        $id = $_GET['cod'];
        $foto = $_GET['nomeFoto'];

        $deletar = 'delete from curiosidades where id_curiosidade ='.$id; 

        echo($deletar);

        if (mysqli_query($conexao, $deletar)) {
            unlink('../bd/arquivos/'.$foto);
            header('location: admCuriosidades.php');
        }
        else {
            define("ERROR_DELET", "ERRO ao apagar a informação!.");
            echo(ERROR_DELET);
        }
    }

    /* Apagar CURIOSIDADES */
    if ($delete == 'deletarSobre') {
        $id = $_GET['cod'];
        $foto = $_GET['nomeFoto'];

        $deletar = 'delete from sobre where id_sobre ='.$id; 

        echo($deletar);

        if (mysqli_query($conexao, $deletar)) {
            unlink('../bd/arquivos/'.$foto);
            header('location: admSobre.php');
        }
        else {
            define("ERROR_DELET", "ERRO ao apagar a informação!.");
            echo(ERROR_DELET);
        }
    }

    /* Apagar CURIOSIDADES */
    if ($delete == 'deletarLoja') {
        $id = $_GET['cod'];
        $foto = $_GET['nomeFoto'];

        $deletar = 'delete from loja where id_loja ='.$id; 

        echo($deletar);

        if (mysqli_query($conexao, $deletar)) {
            unlink('../bd/arquivos/'.$foto);
            header('location: admLoja.php');
        }
        else {
            define("ERROR_DELET", "ERRO ao apagar a informação!.");
            echo(ERROR_DELET);
        }
    }

?>