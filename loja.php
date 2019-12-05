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
            <div class="intro_loja">
                <div class="lojas_fisicas">
                    <div class="center_lojas_f">
                        <div class="lojas">
                            <div class="lojas_itens">
                                <div class="detalhes_loja">
                                
                                </div>
                            </div>
                            <div class="lojas_itens">
                                <div class="detalhes_loja">
                                
                                </div>
                            </div>
                            <div class="lojas_itens">
                                <div class="detalhes_loja">
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="seja_franquiado">
                    <div class="franquia">
                        <div class="center_franquia">
                            <div class="franquia_itens">
                                <div class="center_franquia">
                                    <div class="franq">
                                        <div class="item_franquia">
                                            <div class="adicionar_img">
                                                <div class="img_plus">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="texto_p">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        </div>
                                    </div>
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