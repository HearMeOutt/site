<?php
    session_start();
    if((!isset($_SESSION['id_usuario']) == true)){
        unset($_SESSION['id_usuario']);

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
            include('../assets/components/head.php');
        ?>
        <link rel="stylesheet" href="../assets/css/modulo_alfabeto.css">
    </head>
    <body>
        <?php 
            include('../assets/components/header.php');
        ?>

        <div class="container">
            <!-- !TÍTULO! -->
            <div class="titulo_modulo">
                <h1 class="Michroma">Módulo: Teórico</h1>
            </div>
            <div class="container_cards">
                <!-- !CARD1! -->
                <div class="card1">
                    <div class="img_card1">
                        <img src="../assets/img/Teórico.png" alt="">
                    </div>
                    <div class="txt_card1">
                        <h2 class="MontserratRegular">Neste módulo de Introdução a Libras, você explorará a história, a importância e os fundamentos da Língua Brasileira de Sinais. Com aulas interativas, o curso é ideal para iniciantes, proporcionando um entendimento da Libras e suas diferenças em relação à Língua Portuguesa. Prepare-se para uma experiência de aprendizado envolvente e acessível!</h2>
                    </div>
                    <div class="valor">
                        <h2 class="MontserratBold">Por apenas</h2>
                        <h1 class="MontserratBold">R$10,00</h1>
                    </div>
                </div>
                <!-- !CARD2! -->
                <div class="card card2 card_cinza">
                    <div class="titulo_card">
                        <h1 class="MontserratBold">Objetivos do curso:</h1>
                    </div>
                    <div class="txt_card">
                        <ul class="MontserratRegular">
                            <li>Entender a origem da Libras e seu reconhecimento legal no Brasil.</li>
                            <li>Identificar as diferenças entre Libras e Língua Portuguesa.</li>
                        </ul>
                    </div>
                </div>
                <!-- !CARD3! -->
                <div class="card card3 card_verde">
                    <div class="titulo_card">
                        <h1 class="MontserratBold">Conteúdo programático</h1>
                    </div>
                    <div class="txt_card">
                        <ul class="MontserratRegular">
                            <li>História e Importância da Libras.</li>
                            <li>Estrutura e Diferenças Linguísticas.</li>
                            <li>Comunicação e Vocabulário.</li>
                            <li>Aspectos Culturais e Legais.</li> 
                        </ul>
                    </div>
                </div>
                <!-- !CARD4! -->
                <div class="card card4 card_cinza">
                    <div class="titulo_card">
                        <h1 class="MontserratBold">Material de apoio:</h1>
                    </div>
                    <div class="txt_card">
                        <ul class="MontserratRegular">
                            <li>PDF Exclusivo: Um guia detalhado de cada conteúdo, disponível para download, que serve como referência durante e após o curso.</li>
                        </ul>
                    </div>
                </div>
                <!-- !CARD5! -->
                <div class="card card5 card_verde">
                    <div class="titulo_card">
                        <h1 class="MontserratBold">Duração e modalidade:</h1>
                    </div>
                    <div class="txt_card">
                        <ul class="MontserratRegular">
                            <li>Duração: O curso é composto por 2 horas de conteúdo, distribuídas em aulas curtas e objetivas.</li>
                            <li>Modalidade: Online e ao vivo, permitindo flexibilidade para que você aprenda no seu próprio ritmo.</li>  
                        </ul>
                    </div>
                </div>
            </div>
            <div class="botoes">
                <h1 class="MontserratRegular">Clique no botão abaixo para se inscrever e começar sua jornada no aprendizado de Libras!</h1>
                <div class="btns">
                    <a href="" class="MontserratRegular inscrever">Inscreva-se Agora!</a>
                    <a href="teste_gratis.php" class="MontserratRegular teste">Teste grátis o nosso corretor!</a>
                </div>
            </div>
        </div>

        <?php
            include('../assets/components/footer.php');
        ?>
    </body>
</html>