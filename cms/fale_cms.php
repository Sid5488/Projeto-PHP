<?php
    // Faz a requisição com o BD
    require_once('../bd/conexao.php');

    // Faz a conexão com o BD
    $conexao = conexaoMysql();

    // Inicialização das variável de sessões
   session_start();

    if (isset($_POST['btnBuscar'])) {

        // Sugestão crítica
        $tipoComentario = (string) "";

        // Resgata o valor do select
        $select = $_POST['select'];

        // Atribui o valor resgatado do select
        $tipoComentario = $select;

        // Atribui o valor do select
        $upper = (string) $tipoComentario;

        // Transforma o texto para caixa alta
        $upper = strtoupper($upper);

        // Define como irá gerar os dados
        $script;

        // Filtra o tipo de comentário desejado
        if ($upper == "SUGESTAO" || $upper == "CRITICA") {

            // Indica qual tabela accessar no BD
            $sql = "select * from tblcontato where tipo_opn = ";

            // Específica qual coluna da tabela será exibida
            $sql .= "'".$upper."'";

            // Resgata os dados do BD
            $dados = mysqli_query($conexao, $sql);

            // Define quais dados iram ser imprimidos na tela
            $script = $dados;
        }
    }
    else {
        // Traz o banco inteiro
        $tabela = "select * from tblcontato";
        $tabelaDados = mysqli_query($conexao, $tabela);
        $script = $tabelaDados;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Fale Conosco CMS</title>
    <script src="../js/jquery.js"></script>

    <script>
        $(document).ready(function(){
            $('.visualizar').click(function(){
                $('#container').fadeIn(1000);
            });

            $('#fechar').click(function(){
                $('#container').fadeOut(1000);
            });
        });

        function visualizarDados(idItem) {
            $.ajax({
                type: "POST",
                url: "../modal.php",
                data: {modo: 'visualizar', codigo: idItem},
                success: function(dados) {
                    $('#dadosUsuario').html(dados);
                }
            });
        }
    </script>
</head>
<!-- Modal do site -->
<div id="container">
    <div id="modal" class="center">
        <div id="fechar">
            fechar
        </div>
        <div id="dadosUsuario">
    
        </div>
    </div>
</div>
<body class="pag_cms">
    <div id="cms" class="center">

        <?php require_once('menu_adm.php'); ?>

        <div class="conteudo_cms">
            <div class="conteudo center">
                <div class="pags center">
                    <form method="post" action="fale_cms.php">
                        <select name="select" class="cms_select">
                            <option value="<?= $coments = "sugestao"?>">Sugestão</option>
                            <option value="<?= $coments = "critica"?>">Crítica</option>
                        </select>
                        <input class="btnBuscar" name="btnBuscar" type="submit" value="Buscar">
                    </form>
                    <div class="cliente_resp">
                        <div class="tabela_titulo">
                            <div class="manipula_titulo center">
                                <h2>Avaliação dos Clientes</h2>
                            </div>
                            <hr color="#ba222e"/>
                            <div class="coment">
                                <div class="nome_coment">
                                    Nome
                                </div>
                                <div class="borda"></div>
                                <div class="comentario">
                                    Comentário
                                </div>
                            </div>
                        </div>
                        <?php
                            while ($rd = mysqli_fetch_array($script)) { ?>
                            <div class="coments">
                                <div class="nome_coment">
                                    <?= $rd['nome']?>
                                </div>
                                <div class="borda"></div>
                                <div class="comentario">
                                <?= $rd['mensagem']?>
                                    <div class="visu_delet">
                                        <div class="visualizar">
                                            <a href="#" onclick="visualizarDados(<?=$rd['id']?>);">
                                                <img src="../icons/visu.png">
                                            </a>
                                        </div>
                                        <div class="deletar">
                                            <a href="deletar.php?mod=deletar&cod=<?= $rd['id']?>">
                                                <img src="../icons/deletar.png">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       <?php }?> <!-- Fechamento do WHILE ($rd = mysqli_fetch_array($dados)) -->
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