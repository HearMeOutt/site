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
    // $url = "http://localhost/site/api/api.php/usuarios/id/{$id_usuario}";
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
                        <a href="perfil.php" class="MontserratRegular">Perfil</a>
                        <a href="minhas_assinaturas.php" class="MontserratRegular">Minhas assinaturas</a>
                        <a href="politica_privacidade.php" class="MontserratRegular">Política de privacidade</a>
                        <a href="termos_uso.php" class="MontserratBold">Termos de uso</a>
                        <a href="editar_perfil.php" class="MontserratRegular">Editar Perfil</a>
                    </div>
                    <div class="sair_perfil">
                        <a href="../rotas/sair.php" class="sair_btn MontserratBold">Sair</a>
                    </div>
                </div>
                <div class="termos_uso">
                    <div>
                        <h1 class="MontserratBold">Termos de uso:</h1>
                    </div>
                    <div>
                        <ol>
                            <li class="MontserratBold"><h2 class="MontserratBold">Uso do Serviço</h2></li>
                            <h3 class="MontserratRegular">Você concorda em utilizar este serviço apenas para fins legais e de acordo com estes termos. Você não deve usar este serviço de qualquer forma que possa causar danos a ele ou a terceiros.</h3>
                            <li class="MontserratBold"><h2 class="MontserratBold">Conteúdo</h2></li>
                            <h3 class="MontserratRegular">Todo o conteúdo disponibilizado neste serviço, incluindo texto, imagens, vídeos, e outros materiais, é de propriedade ou licenciado por nós e está protegido por direitos autorais. Você concorda em não reproduzir, distribuir ou criar trabalhos derivados desse conteúdo sem autorização.</h3>
                            <li class="MontserratBold"><h2 class="MontserratBold">Conta do Usuário</h2></li>
                            <h3 class="MontserratRegular">Ao criar uma conta neste serviço, você é responsável por manter a confidencialidade de suas credenciais de login e por todas as atividades que ocorrerem sob sua conta.</h3>
                            <li class="MontserratBold"><h2 class="MontserratBold">Privacidade</h2></li>
                            <h3 class="MontserratRegular">Respeitamos sua privacidade. Ao utilizar este serviço, você concorda com a nossa Política de Privacidade [link para a política de privacidade], que descreve como coletamos, usamos e divulgamos suas informações.</h3>
                            <li class="MontserratBold"><h2 class="MontserratBold">Alterações nos Termos</h2></li>
                            <h3 class="MontserratRegular">Reservamo-nos o direito de modificar estes termos de uso a qualquer momento. Tais modificações entrarão em vigor imediatamente após a publicação dos termos revisados neste serviço. O uso contínuo deste serviço após tais alterações constitui sua aceitação dos termos revisados.</h3>
                            <li class="MontserratBold"><h2 class="MontserratBold">Lei Aplicável</h2></li>
                            <h3 class="MontserratRegular"> Estes termos são regidos e interpretados de acordo com as leis do [país/estado], sem consideração aos seus conflitos de disposições legais.</h3>
                        </ol>
                    </div>
                    <div>
                        <h3 class="MontserratRegular">Ao utilizar este serviço, você concorda com estes termos. Se você não concordar com estes termos, por favor, não continue a utilizar este serviço.</h3>
                        <h3 class="MontserratRegular">Última atualização: 27/05/2024.</h3>
                        <h3 class="MontserratRegular">Se tiver alguma dúvida sobre estes termos, entre em contato conosco em h3arme0utt@gmail.com</h3>
                    </div>
                </div>
            </div>
        </div>
        <?php
            include('../assets/components/footer.php');
        ?>
    </body>
</html>