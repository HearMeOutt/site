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
    $url = "http://localhost/site/api/api.php/usuarios/id/{$id_usuario}";
    //$url = "https://hearmeout.informatica3c.com.br/api/api.php/usuarios/id/{$id_usuario}";
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
                <div class="minhas_matriculas">
                    <?php

                        //$url = "http://localhost/site/api/api.php/matricula/id_usuario/{$id_usuario}";
                        $url = "https://hearmeout.informatica3c.com.br/api/api.php/matricula/id_usuario/{$id_usuario}";
                        $response = file_get_contents($url);
                        $data = json_decode($response, true);

                        if (isset($data['dados'])) {
                            foreach ($data['dados'] as $matricula) {
                                $id_curso = $matricula['fk_cursos_id_curso'];
                                
                                $url = "https://hearmeout.informatica3c.com.br/api/api.php/cursos/id/{$id_curso}";
                                //$url = "http://localhost/site/api/api.php/cursos/id/{$id_curso}";
                                $response = file_get_contents($url);
                                $dados = json_decode($response, true);

                                // Verificar se $dados['dados'] existe
                                if (isset($dados['dados']) && is_array($dados['dados'])) {
                                    // Acessar diretamente o nome do curso
                                    if (isset($dados['dados']['nome'])) {
                                        ?>
                                            <div class="curso_cards">
                                                <div class="img_libras">
                                                    <img src="../assets/img/<?php  echo($dados['dados']['nome']); ?>.png" alt="<?php echo($dados['dados']['nome']); ?>">
                                                </div>
                                                <div class="info_libras">
                                                    <div class="titulo_libras">
                                                        <h1 class="MontserratBold">Módulo: <?php echo($dados['dados']['nome']); ?></h1>
                                                    </div>
                                                    <div class="txt_libras">
                                                        <p class="MontserratRegular"><?php echo($dados['dados']['descricao']); ?></p>
                                                    </div>
                                                    <div class="btn_curso">
                                                        <a class="visualizar_btn MontserratRegular" href="conteudo_curso.php?id=<?php echo($dados['dados']['id_curso']);?>">VISUALIZAR</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php
                                    } else {
                                        echo '<p>O nome do curso não foi encontrado.</p>';
                                    }
                                } else {
                                    echo '<p>Nenhuma matrícula encontrada ou formato inválido.</p>';
                                }
                            }
                        } else {
                            echo '<p>Nenhuma matrícula encontrada.</p>';
                        }  
                    ?>
                </div>
                
            </div>
                    
        </div>
        <?php
            include('../assets/components/footer.php');
        ?>
    </body>
</html>