<?php
    session_start();
    if((!isset($_SESSION['id_usuario']) == true) and (!isset($_SESSION['nome']) == true) and (!isset($_SESSION['email']) == true)){
        unset($_SESSION['id_usuario']);
        unset($_SESSION['nome']);
        unset($_SESSION['email']);
        unset($_SESSION['telefone']);

        //echo 'deslogado';
        $logado = false;
    }else{
        //echo 'logado';
        $logado = true;
    }
?>
<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <?php
            include ('../assets/components/head.php')
        ?>
        <link rel="stylesheet" href="../assets/css/perfil.css">
    </head>
    <body>
        <?php
            include ('../assets/components/header.php')
        ?>
        <div class="container">
            <div class="container_menu">
                <div class="menu_perfil">
                    <div class="img_perfil">
                        <i class="fa-solid fa-user perfil_img"></i>
                        <h1 class="MontserratBold"><?php echo($_SESSION['nome']); ?></h1>
                    </div>
                    <div class="nav_perfil">
                        <a href="perfil.php" class="MontserratRegular">Perfil</a>
                        <a href="minhas_assinaturas.php" class="MontserratRegular">Minhas assinaturas</a>
                        <a href="politica_privacidade.php" class="MontserratRegular">Política de privacidade</a>
                        <a href="termos_uso.php" class="MontserratRegular">Termos de uso</a>
                        <a href="editar_perfil.php" class="MontserratBold">Editar Perfil</a>
                    </div>
                    <div class="sair_perfil">
                        <a href="../rotas/sair.php" class="sair_btn MontserratBold">Sair</a>
                    </div>
                </div>
                <div class="editar_perfil">
                    <div class="tituli_editar">
                        <h1 class="MontserratBold">EDITAR PERFIL:</h1>
                    </div>
                    <form action="../rotas/atualiza_usuario.php" method="POST" class="forms_editar">
                        <div class="item_forms">
                            <h2 class="MontserratBold">Nome:</h2>
                            <input type="text" name="nome_novo" id="nome_novo" value="<?php echo($_SESSION['nome']); ?>" class="MontserratRegular">
                        </div>
                        <div class="item_forms">
                            <h2 class="MontserratBold">Email:</h2>
                            <input type="text" name="email_novo" id="email_novo" value="<?php echo($_SESSION['email']); ?>">
                        </div>
                        <div class="item_forms">
                            <h2 class="MontserratBold">Telefone:</h2>
                            <input type="text" name="telefone_novo" id="telefone_novo" value="<?php echo($_SESSION['telefone']); ?>">
                        </div>

                        <button type="submit">ATUALIZAR</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
            include('../assets/components/footer.php');
        ?>
    </body>
</html>