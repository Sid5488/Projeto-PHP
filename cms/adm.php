<?php
    // Faz a requisição de conexão com o BD
    require_once('../bd/conexao.php');

    // Estabele a conexão com o BD
    $conexao = conexaoMysql();

    // Inicialização das variável de sessões
    session_start();

    $sql = "select * from tbl_nv";
    $resgate = mysqli_query($conexao, $sql);

    if (isset($_POST['btnSalvar'])) {
        $nomeUser = (string) $_POST['txtNome'];
        $userName = (string) $_POST['txtUser'];
        $senhaUser = (string) md5($_POST['txtSenha']);
        $sltNv = (string) $_POST['sltNv'];
        $status = (int) 0;

        $sql = "insert into tbl_usuario (nome, nome_usuario, senha, fk_id, status)
            values ('".$nomeUser."', '".$userName."', '".$senhaUser."', ".$sltNv.", ".$status.")
        ";

        if(mysqli_query($conexao, $sql)) {
            header("location:adm.php");
        }
        else {
            define("ERROR", "Script não enviado para o banco");
            echo(ERROR);
        }
    }

    if (isset($_GET['mod'])) {

        $res = $_GET['mod'];

        // Varifica se o STATUS está: ATIVADO = 1, DESATIVADO = 2, no BD
        if ($res == "status") {
            $boo = $_GET['boo'];
            $id = $_GET['cod'];

            $_SESSION['id_user'] = $id;

            if ($boo) {
                $boo = 0;
                $sql = "update tbl_usuario set status = ".$boo."
                    where id = ".$_SESSION['id_user']."
                ";
                mysqli_query($conexao, $sql);
                header('location:adm.php');
            }
            else {
                $boo = 1;

                $sql = "update tbl_usuario set status = ".$boo."
                    where id = ".$id."
                ";
                mysqli_query($conexao, $sql);
                header('location:adm.php');
            }
        }

        /* EDITAR PERMISSÃO */
        if ($res == "editarCad") {
            $id = $_GET['cod'];

            $_SESSION['id_user'] = $id;

            $sql = "select * from tbl_usuario where id =".$_SESSION['id_user'];
            $resgate = mysqli_query($conexao, $sql);

            if ($rsConsulta = mysqli_fetch_array($resgate)) {
                $nome = $rsConsulta['nome'];
                $nome_usuario = $rsConsulta['nome_usuario'];
                $senha = $rsConsulta['senha'];

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
    
    <?php require_once('menu_adm.php'); ?>

        <div class="conteudo_cms">
            <div class="conteudo center">
                <div class="pags center">
                    <div class="cad_usuarios">
                        <div class="titulo_usuario">
                            Cadstro de Usuários
                        </div>
                        <div class="cadastro">
                            <div class="cad_users">
                                <form action="adm.php" method="post">
                                    <div class="campo_cadastro center">
                                        <div class="cad_camp">
                                            <fieldset>
                                                <legend>Dados</legend>
                                                <div class="camp">
                                                    Nome
                                                </div>
                                                <div class="camp">
                                                    Usuário
                                                </div>
                                                <div class="camp">
                                                    Senha
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <legend>Permissões</legend>
                                                <div class="camp">Permissão</div>
                                            </fieldset>
                                        </div>
                                        <div class="dados_preencher">
                                            <fieldset>
                                                <legend>Insira os dados</legend>
                                                <div class="cad"><input type="text" name="txtNome" value="<?= @$nome ?>"></div>
                                                <div class="cad"><input type="text" name="txtUser" value="<?= @$nome_usuario ?>"></div>
                                                <div class="cad"><input type="password" name="txtSenha" value="<?= @$senha ?>"></div>
                                            </fieldset>
                                            <fieldset>
                                            <legend>Insira a Permissão</legend>
                                                <div class="cad">
                                                    <select name="sltNv">
                                                        <option value="">
                                                            Selecione um nível para o Usuário
                                                        </option>
                                                        <?php
                                                            while ($rs = mysqli_fetch_array($resgate)) {
                                                                if ($rs['status']) {
                                                        ?>
                                                                    <option value="<?= $rs['id'] ?>"><?= $rs['nivel'] ?></option>

                                                                <?php } ?> <!-- Fechamento do IF -->
                                                            <?php } ?> <!-- Fechamento do WHILE -->
                                                    </select>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="caixa_btn"><input class="btnSalvar" name="btnSalvar" type="submit" value="Salvar"></div>
                                    <div class="most_usuarios">
                                        <div class="nm_usuario">
                                            Usuários
                                        </div>
                                        <div class="bd_usuario">
                                        <?php
                                            $selec = "select * from tbl_usuario";
                                            $script = mysqli_query($conexao, $selec);
                                            while ($rd = mysqli_fetch_array($script)) { 
                                        ?>
                                            <div class="users">
                                                <div class="usuario_nm">
                                                    <div class="nm_user">
                                                        <?php echo($rd['nome']);?>
                                                    </div>
                                                    <div class="status">
                                                        <a href="adm.php?mod=status&cod=<?= $rd['id'] ?>&boo=<?= $rd['status'] ?>">
                                                            <img src="../imagens/<?= $rd['status'] ?>.png">
                                                        </a>
                                                    </div>
                                                    <div class="edit_nv">
                                                        <a href="adm.php?mod=editarCad&cod=<?= $rd['id'] ?>"><img src="../icons/edit_cad.png"></a>
                                                    </div>
                                                    <div class="delete_nv">
                                                        <a href="delete_cad.php?mod=deletarUser&cod=<?= $rd['id'] ?>"><img src="../icons/deletar.png"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </form>
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