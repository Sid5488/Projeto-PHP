<?php
    // Faz a requisição de conexão com o BD
    require_once('../bd/conexao.php');

    // Estabele a conexão com o BD
    $conexao = conexaoMysql();

   // Inicialização das variável de sessões
   session_start();

    $nv_1 = 0;
    $nv_2 = 0;
    $nv_3 = 0;
    $botao = (string) "Inserir";

    $select = "select * from tbl_nv";
    $script = mysqli_query($conexao, $select);


    if (isset($_GET['mod'])) {

        $res = $_GET['mod'];

        // Varifica se o STATUS está: ATIVADO = 1, DESATIVADO = 2, no BD
        if ($res == "status") {
            $boo = $_GET['boo'];
            $id = $_GET['cod'];

            $_SESSION['id_nv'] = $id;

            if ($boo) {
                $boo = 0;
                $sql = "update tbl_nv set status = ".$boo."
                    where id = ".$_SESSION['id_nv']."
                ";
                mysqli_query($conexao, $sql);
                header('location:nivel_users.php');
            }
            else {
                $boo = 1;

                $sql = "update tbl_nv set status = ".$boo."
                    where id = ".$id."
                ";
                mysqli_query($conexao, $sql);
                header('location:nivel_users.php');
            }
        }

        /* EDITAR PERMISSÃO */
        if ($res == "editarCad") {
            $id = $_GET['cod'];

            $_SESSION['id_nv'] = $id;

            $sql = "select * from tbl_nv where id =".$_SESSION['id_nv'];
            $resgate = mysqli_query($conexao, $sql);

            if ($rsConsulta = mysqli_fetch_array($resgate)) {
                $nome_nv = $rsConsulta['nivel'];
                $nv_1 = $rsConsulta['nv_1'];
                $nv_2 = $rsConsulta['nv_2'];
                $nv_3 = $rsConsulta['nv_3'];

                $botao = "Editar";
            }
        }
    }

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
        
    <?php require_once('menu_adm.php') ?>

        <div class="conteudo_cms">
            <div class="conteudo center">
                <div class="pags center">
                    <form action="cad_nv.php" method="post">
                        <div class="tabela_niveis">
                            <div class="titulo_niv">
                                Administração dos níveis dos Usuários
                            </div>
                            <div class="conteudo_tabela_nv">
                                <div class="cad_nv">
                                    <div class="nome_admin">Cadastro de Níveis</div>
                                    <div class="nivel">Admin Usuários</div>
                                    <div class="nivel">Admin Conteúdo</div>
                                    <div class="nivel">Admin Feedback</div>
                                </div>
                                <div class="cadastrar_nv">
                                    <div class="nome_nv">
                                        <input type="text" name="nome_nv" value="<?= @$nome_nv?>" placeholder="Nome do nível"> 
                                    </div>
                                    <div class="ck_nv"><input type="checkbox" name="chk_nv1" value="1" <?php if ($nv_1) echo('checked') ?>></div>
                                    <div class="ck_nv"><input type="checkbox" name="chk_nv2" value="1" <?php if ($nv_2) echo('checked') ?>></div>
                                    <div class="ck_nv"><input type="checkbox" name="chk_nv3" value="1" <?php if ($nv_3) echo('checked') ?>></div>
                                </div>
                                <input class="btn_enviar_cad" type="submit" name="btn_botao" value="<?= $botao ?>">
                                <div class="mostrar_cad">
                                    <div class="titulo_niv2">
                                        Administração dos níveis dos Usuários
                                    </div>

                                    <?php
                                        while ($rd = mysqli_fetch_array($script)) {
                                    ?>
                                    <div class="niv_cad">
                                        <div class="nome_admin"><?= $rd['nivel'] ?></div>
                                        <div class="nivel2"><img src="../icons/<?= $rd['nv_1'] ?>.png"></div>
                                        <div class="nivel2"><img src="../icons/<?= $rd['nv_2'] ?>.png"></div>
                                        <div class="nivel2"><img src="../icons/<?= $rd['nv_3'] ?>.png"></div>
                                        <div class="status">
                                            <a href="nivel_users.php?mod=status&cod=<?= $rd['id'] ?>&boo=<?= $rd['status'] ?>">
                                                <img src="../imagens/<?= $rd['status'] ?>.png">
                                            </a>
                                        </div>
                                        <div class="edit_nv"><a href="nivel_users.php?mod=editarCad&cod=<?= $rd['id'] ?>"><img src="../icons/edit_cad.png"></a></div>
                                        <div class="delete_nv"><a href="delete_cad.php?mod=deletarCad&cod=<?= $rd['id'] ?>"><img src="../icons/deletar.png"></a></div>
                                    </div>
                                    <?php    
                                        }
                                    ?>
                                </div>
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