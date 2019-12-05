<?php
     // Faz a requisição de conexão com o BD
     require_once('../bd/conexao.php');

     // Estabele a conexão com o BD
     $conexao = conexaoMysql();

    // Inicialização das variável de sessões
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Atividade</title>
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <meta charset="utf-8">
    </head>
    <body class="pag_cms">
        <!--Área do menu-->
        <div id="cms" class="center">

            <?php require_once('menu_adm.php') ?>

            <div class="conteudo_cms">
                <div class="conteudo center">
                    <div class="pags center">
                        <div class="bem-vindo">
                            Bem-vindo <br> Ao CMS
                        </div>
                    </div>
                </div>
            </div>
            <footer class="rodape_cms center">
                <div class="desenvolvedor">
                    Desenvolvido por: Guilherme Sousa turma ds2t;
                </div>
            </footer>
        </div>
    </body>
</html>