<?php
    // Importa o arquivo de conexão com o BD
    require_once("bd/conexao.php");
    
    // Cria conexão com o BD
    $conexao = conexaoMysql();
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
            <div class="intro_contato">
                <section id="formulario">
                
                <form method="post" id="dContato" action="bd/inserir.php">
                    
                <fieldset id="usuario">
                    
                    <legend>Identificação do Usuário</legend>
                    
                    <p class="formm"> 
                        
                        <label for=cNome>Nome*: <input type="text" name="tNome" id="cNome" size="20" maxlength="30" placeholder="nome completo" onkeypress="return entradaDados(event, 'numeros');" required>
                        </label>
                        
                    </p>
                    
                
                    <p class="formm">
                        
                        <label for="cSenha">Senha: <input type="password" name="tSenha" id="cSenha" placeholder="Min 6 digito" size="8" maxlength="30">
                        </label>
                        
                    </p>
                    
                    <p class="formm">
                        
                        <label for="cEmail">E-mail*: <input type="email" name="tEmail" id="cEmail" size="20" maxlength="40" placeholder="Exemplo@gmail.com" required>
                        </label>
                        
                    </p>
                    
                    <p class="formm">
                        <label for="cCelular">Celular*: <input type="text" name="txtCelular" size="20" maxlength="22" placeholder="(011) 91234-4578" id="celular" required onkeypress="return mascaraCelular(this, event);"></label> 
                    </p>
                    
                        <fieldset id="sexo"><legend>Sexo*:</legend>

                        <input type="radio" name="tSexo" id="cMasc" value="m" required>

                            <label for="cMasc">

                            Masculino

                            </label>

                        <input type="radio" name="tSexo" id="cFem" value="f" required> 

                            <label for="cFem">

                            Feminino

                            </label>

                        </fieldset>
                    </fieldset>
                    
                    <p class="formm">
                        
                <fieldset>
                    
                    <p>
                        <label for="cData">
                            Data de Nascimento:
                            <input type="text" name="txtDataNasc" id="cData" placeholder="01/02/1999" onkeypress="return mascaraDataNasc(this, event);">
                            
                        </label>
                    </p>
                    
                    </fieldset>
                    
                    <fieldset id="endereço">
                        
                        <legend>Endereço do Usuário</legend>
                        
                        <p class="formm">
                            
                            Logradouro: <input type="text" name="tRua" id="cRua" size="13" maxlength="80" placeholder="Rua, av, Trav,">
                        
                        </p>
                        <p class="formm">
                            
                            Número: <input type="text" name="tNum" id="cNum" min="0" max="9999" placeholder="666">
                        
                        </p>
                        <p class="formm">
                            
                            <label for="cEstado">Estado:</label> <input name="tEstado" id="cEstado" onkeypress="return entradaDados(event, 'numeros');" placeholder="São Paulo" onkeypress="return entradaDados(event, 'numeros');">
                            
                        
                        </p>
                        
                        <p class="formm">
                            
                            Cidade: <input type="text" name="tCidade" id="cCidade" size="15" maxlength="20" placeholder="Jandira" onkeypress="return entradaDados(event, 'numeros');">
                        
                        </p>
                        <fieldset>
                            <legend>Deixe sua opinião</legend>
                                <p class="formm">
                                    <input type="radio" name="rdoGenero" value="sugestao"> Sugestão
                                    <input type="radio" name="rdoGenero" value="critica"> Crítica
                                </p>

                                <p class="formm">
                                    <label> Mensagem:*   <textarea name="txtMensagem" placeholder="Escreva sua mensagem..." required></textarea></label>
                                </p>
                        </fieldset>
                        
                        <p class="formm">
                            <label>Profissão:* <input type="text" name="txtProfissao" placeholder="Programador" required onkeypress="return entradaDados(event, 'numeros')"></label>
                        </p>
                        
                    </fieldset>
                               
                    <input type="submit" name="btnSalvar" value="Enviar">
                    
                </form>
                
            </section>
            </div>
        </div>
        <!--rodape-->
        <footer id="rodape">
            <div class="conteudo center">
                <div class="rodape_container">
                    <div class="sistema">
                        <p>Sistema Interno</p>
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
        <script src="js/scriptDados.js"></script>
    </body>
</html>