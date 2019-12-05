<?php
    // Faz a requisição para a conexão com o BD
    require_once('bd/conexao.php');

    // Função que faz a conexão com o BD
    $conexao = conexaoMysql();


    // Resgata o dado da variável modo na URL
    $mod = $_POST['modo'];

    // Deixa a varável mod em caixa alta
    $modo = strtoupper($mod);

    // REsgata o id do BD
    $cod = $_POST['codigo'];

    // Verifica se clicou no visualizar
    if ($modo == 'VISUALIZAR') {
        
        // Script que busca o id do item
        $sql = "select * from tblcontato where id=";

        $sql .= "'".$cod."'";

        $dados = mysqli_query($conexao, $sql);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <div class="dadosUsers">
        <div class="mostrar">
            <div class="titulo_dd">
                <div class="dd_mostrar">
                    NOME
                </div>
                <div class="dd_mostrar">
                    E-MAIL
                </div>
                <div class="dd_mostrar">
                    SEXO
                </div>
                <div class="dd_mostrar">
                    NASCIMENTO
                </div>
                <div class="dd_mostrar">
                    LOGRADOURO
                </div>
                <div class="dd_mostrar">
                    NÚMERO
                </div>
                <div class="dd_mostrar">
                    ESTADO
                </div>
                <div class="dd_mostrar">
                    CIDADE
                </div>
                <div class="dd_mostrar">
                    PROFISSÃO
                </div>
                <div class="dd_mostrar">
                    CRI/SUG
                </div>
                <div class="dd_mostrar">
                    COMENTÁRIO
                </div>
                <div class="dd_mostrar">
                    CELULAR
                </div>
            </div>
            <div class="dd_dados">
                <div class="mostrar_dd">
                    <?php
                        while ($rd = mysqli_fetch_array($dados)) {
                            echo($rd['nome']);
                    ?>
                </div>
                <div class="mostrar_dd">
                    <?php
                        echo($rd['email']);
                    ?>
                </div>
                <div class="mostrar_dd">
                    <?php
                        echo($rd['sexo']);
                    ?>
                </div>
                <div class="mostrar_dd">
                    <?php
                        echo($rd['data_nasc']);
                    ?>
                </div>
                <div class="mostrar_dd">
                    <?php
                        echo($rd['logadouro']);
                    ?>
                </div>
                <div class="mostrar_dd">
                    <?php
                        echo($rd['numero']);
                    ?>
                </div>
                <div class="mostrar_dd">
                    <?php
                        echo($rd['estado']);
                    ?>
                </div>
                <div class="mostrar_dd">
                    <?php
                        echo($rd['cidade']);
                    ?>
                </div>
                <div class="mostrar_dd">
                    <?php
                        echo($rd['profissao']);
                    ?>
                </div>
                <div class="mostrar_dd">
                    <?php
                        echo($rd['tipo_opn']);
                    ?>
                </div>
                <div class="mostrar_dd">
                    <?php
                        echo($rd['mensagem']);
                    ?>
                </div>
                <div class="mostrar_dd">
                    <?php
                        echo($rd['celular']);
                    ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>