<?php
    // Faz a requisição de conexão com o BD
    require_once('../bd/conexao.php');

    // Estabele a conexão com o BD
    $conexao = conexaoMysql();

   // Inicialização das variável de sessões
   session_start();

    // Declaração de variáveis
    $status = (int) 0;

    if (isset($_POST['btnBotao'])) {
        $titulo_curiosidade = $_POST['titulo_curiosidade'];
        $texto_curiosidade = $_POST['texto_curiosidade'];
        $botao = $_POST['btnBotao'];
        
        if ($_FILES['fleFtCuriosidade']['size'] > 0 && $_FILES['fleFtCuriosidade']['type'] != "") {
            
            // Guarda o tamanho do arquivo
            $arquivo_size = $_FILES['fleFtCuriosidade']['size'];

            // Conversão do arquivo para KB
            $tamanho_arquivo = round($arquivo_size/1024);

            // Extensões permitidas
            $tipo_arquivos = array("image/jpeg", "image/jpg", "image/png");

            // Extensão do arquivo
            $ext_arquivo = $_FILES['fleFtCuriosidade']['type'];

            // Valida o tipo de arquivo a ser upado para o servidor
            if (in_array($ext_arquivo, $tipo_arquivos)) {

                // Valida o tamanho do arquivo a ser upado para o servidor
                if ($tamanho_arquivo < 2000) {

                    // Permite retornar apenas o nome do aquivo
                    $nome_arquivo = pathinfo($_FILES['fleFtCuriosidade']['name'], PATHINFO_FILENAME);

                    // Permite retornar apenas a extensão do arquivo
                    $ext = pathinfo($_FILES['fleFtCuriosidade']['name'], PATHINFO_EXTENSION);

                    // Criptografa o nome do arquivo
                    $arquivo_cripty = md5(uniqid(time()).$nome_arquivo);

                    // Arquivo criptografado
                    $foto = $arquivo_cripty.".".$ext;

                    $arquivo_temp = $_FILES['fleFtCuriosidade']['tmp_name'];

                    $diretorio = "../bd/arquivos/";

                    if (move_uploaded_file($arquivo_temp, $diretorio.$foto)) {
                        if ($botao == "Enviar") {
                            $sql = "insert into curiosidades
                                (foto, titulo_curiosidade, texto_curiosidade, status) 
                                values ('".$foto."', '".$titulo_curiosidade."', '".$texto_curiosidade."', ".$status.")
                            ";

                            if (mysqli_query($conexao, $sql)) {
                                header('location:admCuriosidades.php');
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

            $_SESSION['id_curiosidade'] = $id;

            if ($boo) {
                $boo = 0;
                $sql = "update curiosidades set status = ".$boo."
                    where id_curiosidade = ".$_SESSION['id_curiosidade']."
                ";
                mysqli_query($conexao, $sql);
                header('location:admCuriosidades.php');
            }
            else {
                $boo = 1;

                $sql = "update curiosidades set status = ".$boo."
                    where id_curiosidade = ".$id."
                ";
                mysqli_query($conexao, $sql);
                header('location:admCuriosidades.php');
            }
        }

        /* EDITAR PERMISSÃO */
        if ($res == "editarCad") {
            $id = $_GET['cod'];

            $_SESSION['id_curiosidade'] = $id;

            $sql = "select * from curiosidades where id_curiosidade =".$_SESSION['id_curiosidade'];
            $resgate = mysqli_query($conexao, $sql);

            if ($rsConsulta = mysqli_fetch_array($resgate)) {
                $titulo = $rsConsulta['titulo_curiosidade'];
                $texto = $rsConsulta['texto_curiosidade'];

                $botao = "Editar";
            }
        }
    }

    $botao = "Enviar";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>ADM Conteúdo</title>
</head>
<body class="pag_cms">
    <div id="cms" class="center">
    
    <?php require_once('menu_adm.php'); ?>

        <div class="conteudo_cms">
            <div class="conteudo center">
                <div class="cad_curiosidade center">
                    <div class="titulo_curiosidade">
                        Cadastro de Curiosidades
                    </div>
                    <form action="admCuriosidades.php" method="post" enctype="multipart/form-data">
                        <div class="curiosidade">
                            <div class="curiosidadeC">
                                <input type="text" name="titulo_curiosidade" placeholder="Insirao o Título" value="<?= @$titulo ?>" >
                                <div class="texto_esquerdo">
                                    <textarea name="texto_curiosidade" cols="30" rows="10" placeholder="Digite o texto"><?= @$texto ?></textarea>
                                </div>
                                <div class="imagemC">
                                    <input name="fleFtCuriosidade" type="file" value="" >
                                </div>
                                <input name="btnBotao" type="submit" value='<?= $botao ?>'>
                            </div>
                        </div>
                        <div class="most_curiosidade">
                            <div class="titulo_most_curiosidade">
                                Curiosidades
                            </div>
                            <div class="curiosidade_cadastro">

                                <?php 
                                    $sql = "select * from curiosidades";
                                    $select = mysqli_query($conexao, $sql);
                                    while ($rd = mysqli_fetch_array($select)) {
                                ?>

                                <div class="titulo_curiosidade_cad">
                                    <?= $rd['titulo_curiosidade'] ?>
                                </div>
                                <div class="foto_curiosidade">
                                    <img src="../bd/arquivos/<?= $rd['foto'] ?>" width="450">
                                </div>
                                <div class="status">
                                    <a href="admCuriosidades.php?mod=status&cod=<?= $rd['id_curiosidade'] ?>&boo=<?= $rd['status'] ?>">
                                        <img src="../imagens/<?= $rd['status'] ?>.png">
                                    </a>
                                </div>
                                <div class="edit_nv">
                                    <a href="admCuriosidades.php?mod=editarCad&cod=<?= $rd['id_curiosidade'] ?>&nomeFoto=<?= $rd['foto'] ?>"><img src="../icons/edit_cad.png"></a>
                                </div>
                                <div class="delete_nv">
                                    <a href="delete_cad.php?mod=deletarCuriosidade&cod=<?= $rd['id_curiosidade'] ?>&nomeFoto=<?= $rd['foto'] ?>"><img src="../icons/deletar.png"></a>
                                </div>
                                    <?php } ?> <!-- Fechamento do WHILE -->
                            </div>
                        </div>
                    </form>
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