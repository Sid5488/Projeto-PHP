<?php
    // Valor inicial dos checkBox
    $chk_nv1 = (int) 0;
    $chk_nv2 = (int) 0;
    $chk_nv3 = (int) 0;
    $status = (int) 0;

    // Faz a requisição para a conexão com o BD
    require_once('../bd/conexao.php');

    // Estabelece a conexão com o BD
    $conexao = conexaoMysql();

    // Inicialização das variáveis de sessão
    session_start();

    if(isset($_POST['btn_botao'])) {

        // Resgata os valores do formulário do cadastro de níveis
        $nome_nv = $_POST['nome_nv'];
        if (isset($_POST['chk_nv1']))
            $chk_nv1 = intval($_POST['chk_nv1']);

        if(isset($_POST['chk_nv2']))    
            $chk_nv2 = intval($_POST['chk_nv2']);
        
        if(isset($_POST['chk_nv3']))
            $chk_nv3 = intval($_POST['chk_nv3']);

            $botao = strtoupper($_POST['btn_botao']);

        // Verifica se o botão está com o value EDITAR
        if ($botao == "EDITAR") {
            $sql = "update tbl_nv set nivel = '".$nome_nv."',
                nv_1 = ".$chk_nv1.",
                nv_2 = ".$chk_nv2.",
                nv_3 = ".$chk_nv3."
                where id = ".$_SESSION['id_nv']
            ;

            if (mysqli_query($conexao, $sql)) {
                header("location:nivel_users.php");
            }
            else {
                define("ERROR", "Script não enviado para o banco");
                echo(ERROR);
            }
        }
            
        // Verifica se o botão está com o value INSERIR
        else if ($botao == "INSERIR") {
            $sql = "insert into tbl_nv (nivel, nv_1, nv_2, nv_3, status)
                values
                ('".$nome_nv."',
                ".$chk_nv1.",
                ".$chk_nv2.",
                ".$chk_nv3.",
                ".$status.")
            ";

            if (mysqli_query($conexao, $sql)) {
                header("location:nivel_users.php");
            }
            else {
                define("ERROR", "Script não enviado para o banco");
                echo(ERROR);
            }
        }
        else {
            echo('Ainda não sei o que fazer nessa caso!');
        }
    }
?>