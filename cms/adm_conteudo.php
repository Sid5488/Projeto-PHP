<?php
    // Faz a requisição de conexão com o BD
    require_once('../bd/conexao.php');

    // Estabele a conexão com o BD
    $conexao = conexaoMysql();

   // Inicialização das variável de sessões
   session_start();

   // Faz os resgates dos níveis
   $sql = "select * from tbl_nv where id = ".$_SESSION['id_user'];
   $select = mysqli_query($conexao, $sql);
   $rs = mysqli_fetch_array($select);
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
        
            <?php require_once('menu_adm.php'); ?>

            <div class="conteudo_cms">
                <div class="conteudo center">
                    <div class="pags center">
                        <div class="lado_esquerdo">
                            <div class="itens_pags">
                                <div class="cms_img">
                                    
                                </div>
                                <div class="descricao_cms">
                                    <a href="admCuriosidades.php">Curiosidades</a>
                                </div>
                            </div>
                            <div class="itens_pags">
                                <div class="cms_img">
                                    
                                </div>
                                <div class="descricao_cms">
                                    <a href="admSobre.php">Sobre</a>
                                </div>
                            </div>
                            <div class="itens_pags">
                                <div class="cms_img">

                                </div>
                                <div class="descricao_cms">
                                    <a href="admLoja.php">Loja</a>
                                </div>
                            </div>
                            <div class="itens_pags">
                                <div class="cms_img">

                                </div>
                                <div class="descricao_cms">
                                    Descrição
                                </div>
                            </div>
                        </div>
                        <div class="lado_direito">
                            <div class="itens_pags">
                                <div class="cms_img">

                                </div>
                                <div class="descricao_cms">
                                    Descrição
                                </div>
                            </div>
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