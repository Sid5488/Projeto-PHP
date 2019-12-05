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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Document</title>
</head>
<body class="pag_cms">
<div id="cms" class="center">

    <?php require_once('menu_adm.php'); ?>

        <div class="conteudo_cms">
            <div class="conteudo center">
                <div class="pags center">
                <div class="nv center">
                        <div class="niveis">
                            <div class="titulo_nv">
                                <h2>
                                    <a href="nivel_users.php">Níveis</a>
                                </h2>
                            </div>
                            <div class="icon_nv center">
                            
                            </div>
                        </div>
                        <div class="usuarios">
                            <div class="titulo_nv">
                                <h2>
                                    <a href="adm.php">Usuários</a>
                                </h2>
                            </div>
                            <div class="icon_usuario center">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="rodape_cms center">
            <div class="desenvolvedor">
                String desenvolvedor = "Guilherme Sousa turma ds2t";
            </div>
        </footer>
    </div>
</body>
</html>