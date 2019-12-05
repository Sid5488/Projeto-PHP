<?php 

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
            <!--Introdução da página-->
            <div class="intro_promo">
                <!--Promoção principal-->
                <div class="banner_promo">
                    
                </div>
                <!--Detalhes da promoção especial-->
                <div class="detalhes_promo_esp">
                
                </div>
                <!--Promoções do Mês-->
                <div class="itens_promo">
                    <div class="promo_center">
                        <div class="item_promo">
                            <div class="tipo_de_oferta">
                                Oferta site
                            </div>
                            <div class="img_oferta">
                                <div class="m_detalhes">
                                    <p>Textos alatórios</p>
                                </div>
                            </div>
                        </div>
                        <div class="item_promo">
                            <div class="tipo_de_oferta">
                                Oferta só pelo app
                            </div>
                            <div class="img_oferta">
                                <div class="m_detalhes">
                                    <p>Textos alatórios</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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