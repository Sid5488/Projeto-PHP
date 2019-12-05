<?php 
    // Faz a requisição de conexão com o BD
    require_once('bd/conexao.php');

    // Estabele a conexão com o BD
    $conexao = conexaoMysql();

    $sql = "select * from curiosidades";
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Projetão</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset="utf-8">
    </head>
    <body>
        <!--Área dos menus principais-->
        <nav id="menu_desktop_principal">
            <div class="centra_menu center">
                <div class="logo">
                
                </div>
                <ul class="menuu">
                    <li class="item_menu"><a href="index.php">Home</a></li>
                    <li class="item_menu"><a href="curiosidades.php">Curiosidades</a></li>
                    <li class="item_menu"><a href="promocoes.php">Promoções</a></li>
                    <li class="item_menu"><a href="sobre.php">Sobre</a></li>
                    <li class="item_menu"><a href="loja.php">Loja</a></li>
                    <li class="item_menu"><a href="prod_mes.php">Produtos do mês</a></li>
                    <li class="item_menu"><a href="contato.php">Entre em contato</a></li>
                </ul>
                <div class="form">
                    <form name="frmLoginUsuario" method="post" action="index.php">
                        <div class="usuario">
                            Usuário
                            <input id="nome_usuario" type="text" name="txtUsuario" maxlength="50">
                        </div>
                        <div class="senha">
                            Senha
                            <input id="senha_usuario" type="password" name="txtSenha" maxlength="15">
                        </div>
                        <div class="botao">
                            <input type="submit" name="btnBotao" value="login">
                        </div>
                    </form>
                </div>
            </div>
        </nav>
        <!--Área do conteúdo-->
        <div class="conteudo center">
            <div class="intro_curiosidade">
                <h1 class="titulo_section">
                    Curiosidades
                </h1>
                <hr>
                <!--Introdução da página-->
                    <?php 
                        $select = mysqli_query($conexao, $sql);
                        while ($array = mysqli_fetch_array($select)) {
                            if ($array['status']) {
                                if ($array['id_curiosidade'] % 2 == 0) {
                    ?>
                <div class="lado_esquerdo">
                    <h2 class="subtitulos">
                        <?= $array['titulo_curiosidade']; ?>
                    </h2>
                    <p class="texto_p">
                        <?= $array['texto_curiosidade']; ?>
                    </p>
                </div>
                <div class="lado_direito">
                    <div class="img_origem">
                        <img src="bd/arquivos/<?= $array['foto']; ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
         
         <!-- Criosidade Impar -->

        <div class="curiosidade_impar">
            <div class="conteudo center">
                <?php
                        } // fechamento do IF par
                        else if ($array['id_curiosidade'] % 2 != 0) {  ?>
                            <div class="intro_curiosidade_impar">
                                <div class="lado_esquerdo">
                                    <h2 class="subtitulos">
                                        <?= $array['titulo_curiosidade']; ?>
                                    </h2>
                                    <p class="texto_p">
                                        <?= $array['texto_curiosidade']; ?>
                                    </p>
                                </div>
                                <div class="lado_direito">
                                    <div class="img_origem">
                                        <img src="bd/arquivos/<?= $array['foto']; ?>" alt="">
                                    </div>
                                </div>
                            </div>
                <?php
                        } // Fechamento do ELSE IF
                    } // Fechamento IF 
                } // Fechamento WHILE
                ?>
            </div>
        </div>
        <!--rodape-->
        <footer id="rodape">
            <div class="conteudo center">
                <div class="rodape_container">
                    <div class="sistema">
                        <p><a href="cms/home.php">Sistema Interno</a></p>
                    </div>
                     <div class="endereco">
                        <p>Endereço: xxxxx.xxxxxx.xxx - xxxx.xxxxxx - xxxx.</p>
                    </div>
                    <div class="app">
                        <div class="img_app">

                        </div>
                        <div class="baixar_app">
                            <p>Baixe o App</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>