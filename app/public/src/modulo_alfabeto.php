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
                <h1 class="Michroma">Módulo: Alfabeto em libras</h1>
            </div>
            <div class="container_cards">
                <!-- !CARD1! -->
                <div class="card1">
                    <div class="img_card1">
                        <img src="../assets/img/alfabeto.png" alt="">
                    </div>
                    <div class="txt_card1">
                        <h2 class="MontserratRegular">Neste módulo do alfabeto em Libras, você aprenderá a soletrar e reconhecer cada letra por meio de aulas práticas e interativas. Projetado para iniciantes, o curso combina material didático de alta qualidade com tecnologia de ponta para garantir um aprendizado eficaz e acessível.</h2>
                    </div>
                </div>
                <!-- !CARD2! -->
                <div class="card card2 card_cinza">
                    <div class="titulo_card">
                        <h1 class="MontserratBold">Objetivos do curso:</h1>
                    </div>
                    <div class="txt_card">
                        <ul class="MontserratRegular">
                            <li>Ensinar o alfabeto completo em Libras.</li>
                            <li>Capacitar os alunos a formar e reconhecer cada letra com precisão.</li>
                            <li>Oferecer feedback instantâneo para aprimorar o aprendizado.</li> 
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
                            <li>Introdução ao alfabeto em Libras.</li>
                            <li>Aulas detalhadas de cada letra, com explicações sobre os movimentos.</li>
                            <li>Prática guiada e exercícios interativos.</li>
                            <li>Revisões e testes de conhecimento.</li> 
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
                            <li>PDF Exclusivo: Um guia detalhado de cada letra e movimento, disponível para download, que serve como referência durante e após o curso.</li>
                        </ul>
                    </div>
                </div>
                <!-- !CARD5! -->
                <div class="card card5 card_verde">
                    <div class="titulo_card">
                        <h1 class="MontserratBold">Tecnologia de Feedback em Tempo Real:</h1>
                    </div>
                    <div class="txt_card">
                        <ul class="MontserratRegular">
                            <li>Corretor Automático com IA: Utilize sua câmera para praticar e corrigir cada movimento. Nossa inteligência artificial oferece feedback preciso, ajudando você a ajustar sua técnica em tempo real.</li>
                        </ul>
                    </div>
                </div>
                <!-- !CARD6! -->
                <div class="card card6 card_cinza">
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
                <!-- !CARD7! -->
                <div class="card card7 card_verde">
                    <div class="titulo_card">
                        <h1 class="MontserratBold">Teste grátis:</h1>
                    </div>
                    <div class="txt_card">
                        <ul class="MontserratRegular">
                            <li> Antes de se inscrever, você pode experimentar a plataforma gratuitamente, corrigindo os números em Libras com nosso corretor automático, para entender como a tecnologia funciona.</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="botoes">
                <h1 class="MontserratRegular">Clique no botão abaixo para se inscrever e começar sua jornada no aprendizado de Libras!</h1>
                <div class="btns">
                    <a href="" class="MontserratRegular inscrever">Inscreva-se Agora!</a>
                    <a href="../../../IA/index.html" class="MontserratRegular teste">Teste grátis</a>
                </div>
            </div>
        </div>

        <?php
            include('../assets/components/footer.php');
        ?>
    </body>
</html>