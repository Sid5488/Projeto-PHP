<?php
     // Faz a requisição de conexão com o BD
     require_once('../bd/conexao.php');

     // Estabele a conexão com o BD
     $conexao = conexaoMysql();

    // Inicialização das variável de sessões
    session_start();

    $status = (int) 0;

   if (isset($_POST['bntEnviar'])) {
        $titulo_sobre = (string) $_POST['titulo_sobre'];
        $texto_Sobre = (string) $_POST['sobre_text'];
        $botao = (string) $_POST['btnEnviar'];

        if ($_FILES['fileLoja']['size'] > 0 && $_FILES['fileLoja']['type'] != "") {
            $arquivo_size = $_FILES['fileLoja']['size'];
            $tamanho_arquivo = round($arquivo_size/1024);
            $tipo_arquivos = array("image/jpeg", "image/jpg", "image/png");
            $ext_arquivo = $_FILES['fileLoja']['type'];

            if (in_array($ext_arquivo, $tipo_arquivos)) {
                if ($tamanho_arquivo < 2000) {
                    $nome_arquivo = pathinfo($_FILES['fileLoja']['name'], PATHINFO_FILENAME);
                    $ext = pathinfo($_FILES['fileLoja']['name'],PATHINFO_EXTENSION);
                    $nome_arquivo_cripty = md5(uniqid(time()).$nome_arquivo);
                    $foto = $nome_arquivo_cripty. ".". $ext;
                    $arquivo_temp = $_FILES['fileLoja']['tmp_name'];
                    $diretorio = "arquivos/";

                    if (move_uploaded_file($arquivo_temp, $diretorio.$foto)) {
                        if ($botao == "Enviar") {
                            $sql = "insert into loja
                                (foto, titulo_loja, texto_loja, status) 
                                values ('".$foto."', '".$titulo_loja."', '".$texto_loja."', ".$status.")
                            ";

                            if (mysqli_query($conexao, $sql)) {
                                header('location:admLoja.php');
                            }
                            else {
                                echo('Erro ao executar o script');
                            }
                        }
                    }
                }
            }
        }
    }

    if (isset($_GET['mod'])) {

        $res = $_GET['mod'];

        // Varifica se o STATUS está: ATIVADO = 1, DESATIVADO = 2, no BD
        if ($res == "status") {
            $boo = $_GET['boo'];
            $id = $_GET['cod'];

            $_SESSION['id_loja'] = $id;

            if ($boo) {
                $boo = 0;
                $sql = "update loja set status = ".$boo."
                    where id_loja = ".$_SESSION['id_loja']."
                ";
                mysqli_query($conexao, $sql);
                header('location:admLoja.php');
            }
            else {
                $boo = 1;

                $sql = "update loja set status = ".$boo."
                    where id_loja = ".$id."
                ";
                mysqli_query($conexao, $sql);
                header('location:admLoja.php');
            }
        }

        /* EDITAR PERMISSÃO */
        if ($res == "editarCad") {
            $id = $_GET['cod'];

            $_SESSION['id_loja'] = $id;

            $sql = "select * from loja where id_loja =".$_SESSION['id_loja'];
            $resgate = mysqli_query($conexao, $sql);

            if ($rsConsulta = mysqli_fetch_array($resgate)) {
                $titulo = $rsConsulta['titulo_loja'];
                $texto = $rsConsulta['texto_loja'];

                $botao = "Editar";
            }
        }
    }

    $botao = "Enviar";
    
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

            <!-- <?php require_once('menu_adm.php') ?> -->

            <div class="conteudo_cms">
                <div class="conteudo center">
                    <div class="pags center">
                    <div class="cad_sobre center">
                        <div class="sobreAdm">
                            Loja
                        </div>
                            <div class="sobreConteudo">
                                <form action="admLoja.php" method='post' enctype="multipart/form-data">
                                    <div class="sobre_s">
                                        <input type="text" name="titulo_loja" placeholder="Digite o Título">
                                        <textarea name="texto_loja" placeholder="Digite o Texto" cols="30" rows="10"></textarea>
                                        <input name="fileLoja" type="file">
                                        <input name="btnEnviar" type="submit">
                                    </div>
                                </form>
                                <div class="sobre_bd">
                                    <div class="titulo_sobreBD">
                                        Loja
                                    </div>
                                    <div class="curiosidade_cadastro">

                                <?php 
                                    $sql = "select * from loja";
                                    $select = mysqli_query($conexao, $sql);
                                    while ($rd = mysqli_fetch_array($select)) {
                                ?>

                                <div class="titulo_curiosidade_cad">
                                    <?= $rd['titulo_loja'] ?>
                                </div>
                                <div class="foto_curiosidade">
                                    <img src="../bd/arquivos/<?= $rd['foto'] ?>" width="450">
                                </div>
                                <div class="status">
                                    <a href="admLoja.php?mod=status&cod=<?= $rd['id_loja'] ?>&boo=<?= $rd['status'] ?>">
                                        <img src="../imagens/<?= $rd['status'] ?>.png">
                                    </a>
                                </div>
                                <div class="edit_nv">
                                    <a href="admLoja.php?mod=editarCad&cod=<?= $rd['id_loja'] ?>&nomeFoto=<?= $rd['foto'] ?>"><img src="../icons/edit_cad.png"></a>
                                </div>
                                <div class="delete_nv">
                                    <a href="delete_cad.php?mod=deletarLoja&cod=<?= $rd['id_loja'] ?>&nomeFoto=<?= $rd['foto'] ?>"><img src="../icons/deletar.png"></a>
                                </div>
                                    <?php } ?> <!-- Fechamento do WHILE -->
                            </div>
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