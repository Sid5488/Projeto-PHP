<?php 
    // Faz a requisição de conexão com o BD
    require_once('../bd/conexao.php');

    // Estabele a conexão com o BD
    $conexao = conexaoMysql();

   // Faz os resgates dos níveis
   $sql = "select * from tbl_nv where id = ".$_SESSION['id_user'];
   $select = mysqli_query($conexao, $sql);
   $rs = mysqli_fetch_array($select);

   if (isset($_POST['btnLogout'])) {
        session_destroy();
        header('location:../index.php');
   }

?>
<div class="caixa_menu center">
    <div class="caixa_titulo_subtitulo">
        <div class="titulo_pizzaria">
            <h1>Frajola´s</h1>
        </div>
        <div class="subtitulo_cms">
            <h2>CMS - Sistema de Gerenciamento do site</h2>
        </div>
    </div>
    <div class="img_cms">

    </div>
</div>
<!--Área do Administrador-->
<div class="login_cms center">
    <?php 
        if ($rs['nv_2']) {
    ?>
    <div class="adm_conteudo">
        <div class="img_adm_cont">
            
        </div>
        <div class="descricao_adm_cont center">
            <a href="adm_conteudo.php">Adm. conteudo</a>
        </div>
    </div>
    <?php } ?>
    <?php 
        if ($rs['nv_3']) {
    ?>
    <div class="adm_fale_conosco">
        <div class="img_fale">
        
        </div>
        <div class="desc_fale center">
            <a href="fale_cms.php">Fale conosco</a>
        </div>
    </div>
    <?php } ?>
    <div class="adm_usuario">
        <?php 
            if ($rs['nv_1']) {
        ?>
        <div class="login_usuario">
            <div class="img_usuario center">
                
            </div>
            <div class="desc_usuario center">
            <a href="adm_users.php">Adm. usuário</a>
            </div>
        </div>
            <?php } ?>
        <div class="nome_usuario">
            Bem-vindo, [xxxxx xxx].
        </div>
        <div class="logout">
            <form action="menu_adm.php" method="post">
                <input type="submit" value="logout" name="btnLogout">
            </form>
        </div>
    </div>
</div>