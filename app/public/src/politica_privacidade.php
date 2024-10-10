<?php
    session_start();
    if((!isset($_SESSION['id']) == true) and (!isset($_SESSION['nome']) == true) and (!isset($_SESSION['email']) == true)){
        unset($_SESSION['id']);
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
                        <a href="politica_privacidade.php" class="MontserratBold">Política de privacidade</a>
                        <a href="termos_uso.php" class="MontserratRegular">Termos de uso</a>
                        <a href="editar_perfil.php" class="MontserratRegular">Editar Perfil</a>
                    </div>
                    <div class="sair_perfil">
                        <a href="../rotas/sair.php" class="sair_btn MontserratBold">Sair</a>
                    </div>
                </div>
                <div class="politica_privacidade">
                    <div>
                        <h1 class="MontserratBold">Política de privacidade do Hear Me Out</h1>
                        <h3 class="MontserratRegular">Esta Política de Privacidade descreve como Hear Me Out coleta, usa e compartilha informações pessoais quando você usa nosso aplicativo.</h3>
                    </div>
                    <div>
                        <h2 class="MontserratBold">Informações que coletamos</h2>
                        <h3 class="MontserratRegular">Quando você usa o Serviço, podemos coletar as seguintes informações:</h3>

                        <ul>
                            <li><h3 class="MontserratBold">Informações de Registro:</h3></li>
                            <h3 class="MontserratRegular">Quando você cria uma conta, podemos coletar seu nome, endereço de e-mail, número de telefone e senha.</h3>
                            <li><h3 class="MontserratBold">Dados de Contato:</h3></li>
                            <h3 class="MontserratRegular">Podemos coletar as informações de contato dos seus amigos e contatos para facilitar a conexão com eles no aplicativo.</h3>
                            <li><h3 class="MontserratBold">Dados de Uso: </h3></li>
                            <h3 class="MontserratRegular">Coletamos informações sobre como você usa o Serviço, como as chamadas de vídeo que você faz, a duração das chamadas, os participantes das chamadas e o uso de recursos do aplicativo.</h3>
                        </ul> 
                    </div>
                    <div>
                        <h2 class="MontserratBold">Uso das informações</h2>
                        <h3 class="MontserratRegular">Podemos usar as informações coletadas para:</h3>
                        <ul>
                            <li><h3 class="MontserratRegular">Fornecer, manter e melhorar nosso Serviço.</h3></li>
                            <li><h3 class="MontserratRegular">Personalizar sua experiência no aplicativo e fornecer conteúdo relevante.</h3></li>
                            <li><h3 class="MontserratRegular">Enviar comunicações relacionadas ao Serviço, como atualizações, avisos técnicos e informações sobre novos recursos.</h3></li>
                            <li><h3 class="MontserratRegular">Realizar análises e pesquisas para entender melhor como nosso Serviço é usado e como podemos melhorá-lo.</h3></li>
                            <li><h3 class="MontserratRegular">Cumprir com obrigações legais ou regulatórias.</h3></li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="MontserratBold">Compartilhamento das informações</h2>
                        <h3 class="MontserratRegular">Não compartilhamos suas informações pessoais com terceiros, exceto nas seguintes circunstâncias:</h3>
                        <ul>
                            <li><h3 class="MontserratRegular">Com o seu consentimento.</h3></li>
                            <li><h3 class="MontserratRegular">Com prestadores de serviços terceirizados que nos auxiliam na operação do Serviço, sujeitos a obrigações de confidencialidade.</h3></li>
                            <li><h3 class="MontserratRegular">Quando acreditarmos de boa-fé que a divulgação é necessária para proteger nossos direitos, proteger sua segurança ou a segurança de outros, investigar fraudes ou responder a uma solicitação do governo.</h3></li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
        <?php
            include('../assets/components/footer.php');
        ?>
    </body>
</html>