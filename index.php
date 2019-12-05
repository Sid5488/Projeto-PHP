<?php
    // Import no arquivo que faz a conexão com o BD
    require_once("bd/conexao.php");

    // Declara a conexão com o BD
    $conexao = conexaoMysql();

    // Inicialização das variável de sessões
    session_start();

    if (isset($_POST['btnBotao'])) {
        $usuario = (string) $_POST['txtUsuario'];
        $senha = (string) md5($_POST['txtSenha']);

        $sql = "select * from tbl_usuario";
        $select = mysqli_query($conexao, $sql);

        while ($rs = mysqli_fetch_array($select)) {
            if ($rs['nome_usuario'] == $usuario && $rs['senha'] == $senha) {
                
                $sql = "select * from tbl_nv where id = ".$rs['fk_id'];
                
                $_SESSION['id_user'] = $rs['fk_id'];
                
                $select = mysqli_query($conexao, $sql);
                $resgate = mysqli_fetch_array($select);
                
                if ($resgate['nv_1']  && $resgate['status'] || $resgate['nv_2'] && $resgate['status'] || $resgate['nv_3'] && $resgate['status']) {
                    header('location:cms/home.php');
                }
                else {
                    echo('Usuaário não existe');
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Projeto Marcel</title>
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
        <div class="conteudo center">
            <!--Redes sociais-->
            <div class="redes_sociais">
                <div class="sociais">
                    <div class="img_facebook">
                        
                    </div>
                </div>
                <div class="sociais">
                    <div class="img_instagram">
                        
                    </div>
                </div>
                <div class="sociais">
                    <div class="img_twitter">
                        
                    </div>
                </div>
            </div>
            <!--Slider-->
            <div class="slider">
                <!-- Slideshow container -->
                <div class="slideshow-container">

                  <!-- Full-width images with number and caption text -->
                  <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>
                        <img src="imagens/slide1.jpg" width="1200" height="424" alt="pizza">
                    <div class="text">Teste de texto</div>
                  </div>

                  <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                       <img src="imagens/slide1.jpg" width="1200" height="424" alt="pizza">
                    <div class="text">Teste de texto</div>
                  </div>

                  <div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                      <img src="imagens/slide1.jpg" width="1200" height="424" alt="pizza">
                    <div class="text">Teste de texto</div>
                  </div>

                  <!-- Next and previous buttons -->
                  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                  <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
                <br>
            </div>
            <!--Menu secundário-->
            <div class="segura_conteudo">
                <nav id="menu_secundario">
                    <div class="itens_seg">Itens 01</div>
                    <div class="itens_seg">Itens 02</div>
                    <div class="itens_seg">Itens 03</div>
                    <div class="itens_seg">Itens 04</div>
                    <div class="itens_seg">Itens 05</div>
                    <div class="itens_seg">Itens 06</div>
                    <div class="itens_seg">Itens 07</div>
                    <div class="itens_seg">Itens 08</div>
                    <div class="itens_seg">Itens 09</div>
                    <div class="itens_seg">Itens 10</div>
                    <div class="itens_seg">Itens 11</div>
                    <div class="itens_seg">Itens 12</div>
                    <div class="itens_seg">Itens 13</div>
                    <div class="itens_seg">Itens 14</div>
                    <div class="itens_seg">Itens 15</div>
                    <div class="itens_seg">Itens 16</div>
                    <div class="itens_seg">Itens 17</div>
                </nav>
                <!--Área do conteúdo-->
                <div class="home">
                    <!--Produtos do site-->
                    <div class="produtos">
                        <div class="itens">
                            <!--Imagem dos produtos-->
                            <div class="img_prod">
                            
                            </div>
                            <!--Descrição do item-->
                            <div class="descricao">
                                <!--Nome do produto-->
                                <div class="nomeProd">
                                    Nome:
                                </div>
                                <!--Bloco da descrição-->
                                <div class="desc">
                                    Descrição: 
                                </div>
                                <!--Preço-->
                                <div class="preco">
                                    Preço:
                                </div>
                            </div>
                            <!--Detalhes-->
                            <div class="detalhes">
                                Detalhes
                            </div>
                        </div>
                        <div class="itens">
                            <!--Imagem dos produtos-->
                            <div class="img_prod">
                            
                            </div>
                            <!--Descrição do item-->
                            <div class="descricao">
                                <!--Nome do produto-->
                                <div class="nomeProd">
                                    Nome:
                                </div>
                                <!--Bloco da descrição-->
                                <div class="desc">
                                    Descrição:
                                </div>
                                <!--Preço-->
                                <div class="preco">
                                    Preço:
                                </div>
                            </div>
                            <!--Detalhes-->
                            <div class="detalhes">
                                Detalhes
                            </div>
                        </div>
                        <div class="itens">
                            <!--Imagem dos produtos-->
                            <div class="img_prod">
                            
                            </div>
                            <!--Descrição do item-->
                            <div class="descricao">
                                <!--Nome do produto-->
                                <div class="nomeProd">
                                    Nome:
                                </div>
                                <!--Bloco da descrição-->
                                <div class="desc">
                                    Descrição:
                                </div>
                                <!--Preço-->
                                <div class="preco">
                                    Preço:
                                </div>
                            </div>
                            <!--Detalhes-->
                            <div class="detalhes">
                                Detalhes
                            </div>
                        </div>
                        <div class="itens">
                            <!--Imagem dos produtos-->
                            <div class="img_prod">
                            
                            </div>
                            <!--Descrição do item-->
                            <div class="descricao">
                                <!--Nome do produto-->
                                <div class="nomeProd">
                                    Nome:
                                </div>
                                <!--Bloco da descrição-->
                                <div class="desc">
                                    Descrição:
                                </div>
                                <!--Preço-->
                                <div class="preco">
                                    Preço:
                                </div>
                            </div>
                            <!--Detalhes-->
                            <div class="detalhes">
                                Detalhes
                            </div>
                        </div>
                        <div class="itens">
                            <!--Imagem dos produtos-->
                            <div class="img_prod">
                            
                            </div>
                            <!--Descrição do item-->
                            <div class="descricao">
                                <!--Nome do produto-->
                                <div class="nomeProd">
                                    Nome:
                                </div>
                                <!--Bloco da descrição-->
                                <div class="desc">
                                    Descrição:
                                </div>
                                <!--Preço-->
                                <div class="preco">
                                    Preço:
                                </div>
                            </div>
                            <!--Detalhes-->
                            <div class="detalhes">
                                Detalhes
                            </div>
                        </div>
                        <div class="itens">
                            <!--Imagem dos produtos-->
                            <div class="img_prod">
                            
                            </div>
                            <!--Descrição do item-->
                            <div class="descricao">
                                <!--Nome do produto-->
                                <div class="nomeProd">
                                    Nome:
                                </div>
                                <!--Bloco da descrição-->
                                <div class="desc">
                                    Descrição:
                                </div>
                                <!--Preço-->
                                <div class="preco">
                                    Preço:
                                </div>
                            </div>
                            <!--Detalhes-->
                            <div class="detalhes">
                                Detalhes
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
        <script src="js/script.js"></script>
    </body>
</html>