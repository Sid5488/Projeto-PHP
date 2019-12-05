<?php 
    if (isset($_POST['btnSalvar'])) {
        // Importa o arquivo que faz a conexão com o BD
        require_once('conexao.php');

        //Chamada para estabelecer a conexão com o BD
        $conexao = conexaoMysql();
        
        $nome = $_POST['tNome'];
        $senha = $_POST['tSenha'];
        $email = $_POST['tEmail'];
        $sexo = $_POST['tSexo'];
        $data_de_nascimento = explode("/", $_POST['txtDataNasc']);
        $data_de_nascimento = $data_de_nascimento[2] . "-" . $data_de_nascimento[1] . "-" . $data_de_nascimento[0];
        $rua = $_POST['tRua'];
        $numero = $_POST['tNum'];
        $estado = $_POST['tEstado'];
        $cidade = $_POST['tCidade'];
        $celular = $_POST['txtCelular'];
        $mensagem = $_POST['txtMensagem'];
        $profissao = $_POST['txtProfissao'];
        $opn = $_POST['rdoGenero'];
        
        $sql = "
        insert into tblcontato
        (nome,
        senha,
        email,
        sexo,
        data_nasc,
        logadouro,
        numero,
        estado,
        cidade,
        tipo_opn, 
        celular, 
        mensagem,
        profissao) 
        value
        ('".$nome."',
        '".$senha."',
        '".$email."',
        '".$sexo."',
        '".$data_de_nascimento."',
        '".$rua."',
        '".$numero."',
        '".$estado."',
        '".$cidade."',
        '".$opn."', 
        '".$celular."', 
        '".$mensagem."',
        '".$profissao."')";
        
        if (mysqli_query($conexao, $sql)) {
            header("location:../contato.php");
        }
        else {
            define("ERROR", "Script não enviado para o banco");
            echo(ERROR);
        }
    }
?>