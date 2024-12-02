<?php
    session_start();
    if((!isset($_SESSION['id_usuario']) == true)){
        unset($_SESSION['id_usuario']);

        //echo 'deslogado';
        $logado = false;

        header('location: index.php');
    }else{
        //echo 'logado';
        $logado = true;
    }
?>
<?php
    $id_usuario = $_SESSION['id_usuario'];
    //$url = "http://localhost/site/api/api.php/usuarios/id/{$id_usuario}";
    $url = "https://hearmeout.informatica3c.com.br/api/api.php/usuarios/id/{$id_usuario}";
    $response = file_get_contents($url);
    $data = json_decode($response, true);
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
                        <h1 class="MontserratBold"><?php echo($data['dados']['nome']); ?></h1>
                    </div>
                    <div class="nav_perfil">
                        <a href="perfil.php" class="MontserratBold">Perfil</a>
                        <a href="minhas_assinaturas.php" class="MontserratRegular">Minhas assinaturas</a>
                        <a href="politica_privacidade.php" class="MontserratRegular">Política de privacidade</a>
                        <a href="termos_uso.php" class="MontserratRegular">Termos de uso</a>
                        <a href="editar_perfil.php" class="MontserratRegular">Editar Perfil</a>
                    </div>
                    <div class="sair_perfil">
                        <a href="../rotas/sair.php" class="sair_btn MontserratBold">Sair</a>
                    </div>
                </div>
                <div class="infos_perfil">
                    <div class="nome_perfil informacao">
                        <h1 class="MontserratBold">Nome: </h1>
                        <h2 class="MontserratRegular"><?php echo($data['dados']['nome']); ?></h2>
                    </div>
                    <div class="email_perfil informacao">
                        <h1 class="MontserratBold">Email: </h1>
                        <h2 class="MontserratRegular"><?php echo($data['dados']['email']); ?></h2>
                    </div>
                    <div class="telefone_perfil informacao">
                        <h1 class="MontserratBold">Telefone: </h1>
                        <h2 class="MontserratRegular"><?php echo($data['dados']['telefone']); ?></h2>
                    </div>
                </div>
                
            </div>
        </div>
        <?php
            include('../assets/components/footer.php');
        ?>
    </body>
</html>