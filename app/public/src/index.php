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
            include ('../assets/components/head.php')
        ?>
        <link rel="stylesheet" href="../assets/css/index.css">
    </head>
    <body>
        <?php
            include ('../assets/components/header.php')
        ?>

        <!-- !TOPO! -->
        <div class="fundo_topo">
            <div class="topo">
                <div class="bem_vindo">
                    <div class="texto_bemvindo">
                        <h3 class="Michroma">Bem vindo (a) ao</h3>
                        <h1 class="Michroma">Hear Me Out</h1>
                        <h3 class="MontserratRegular">Conectando mãos, Ampliando vozes</h3>
                    </div>
                    <div class="btn_topo">
                        <a href="introducao.php" class="btn_aprender MontserratBold">
                            APRENDA LIBRAS NA HEARMEOUT !
                        </a>
                    </div>
                </div>
                <div class="img_topo">
                    <img src="../assets/img/persona.png" alt="Persona fazendo sinal de libras">
                </div>
            </div>
        </div>

        <!-- !CARDS! -->
        <div class="container_cards">
            <div class="card card1">
                <div class="img_card">
                    <img src="../assets/img/card1.png" alt="Imagem libras">
                </div>
                <div class="texto_card">
                    <h1 class="Michroma">Com Libras, o silêncio se transforma em conexão e aprendizado.</h1>
                </div>
            </div>
            <div class="card card2">
                <div class="img_card">
                    <img src="../assets/img/card2.png" alt="Imagem ouvido">
                </div>
                <div class="texto_card">
                    <h1 class="Michroma">O futuro da inclusão começa agora!</h1>
                </div>
            </div>
            <div class="card card3">
                <div class="img_card">
                    <img src="../assets/img/card3.png" alt="Monitor">
                </div>
                <div class="texto_card">
                    <h1 class="Michroma">Corrija seus movimentos em tempo real!</h1>
                </div>
            </div>
        </div>
        
        <!-- !CONTAINER! -->
        <div class="container">

            <!-- !CONHECA! -->
            <div class="conheca">
                <h1 class="Michroma titulo_conheca">CONHEÇA O HEAR ME OUT!</h1>
                <div class="container_conheca">
                    <div class="img_conheca">
                        <img src="../assets/img/conheca_hearmeout.png" alt="">
                    </div>
                    <div class="infos_conheca">
                        <div class="txt_conheca">
                            <h1 class="MontserratRegular">Em nossa plataforma de aprendizado de Libras,  acreditamos que a comunicação é essencial. Nossa missão é promover a inclusão e facilitar a aprendizagem da Língua Brasileira de Sinais (Libras) para todos. </h1>
                        </div>
                        <div class="list_conheca">
                            <div class="list_conheca_item">
                                <h1 class="MontserratBold">Explicação simplificada</h1>
                            </div>
                            <div class="list_conheca_item">
                                <h1 class="MontserratBold">Do teórico ao prático</h1>
                            </div>
                            <div class="list_conheca_item">
                                <h1 class="MontserratBold">Corretor em tempo real</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- !ALFABETO! -->
            <div class="alfabeto">
                <div class="infos_alfabeto">
                    <div class="txt_alfabeto">
                        <h2 class="Michroma">
                            Aprenda o alfabeto em Libras com feedback ao vivo por um preço que cabe no seu bolso!
                        </h2>
                    </div>
                    <div class="btn_alfabeto">
                        <a href="introducao.php" class="MontserratBold">INSCREVA-SE JÁ!</a>
                    </div>
                </div>
                <div class="img_alfabeto">
                    <img src="../assets/img/alfabeto_cores_hearmeout.png" alt="Simbolização do alfabeto">
                </div>
            </div>    
        </div>

        <?php
            include ('../assets/components/footer.php')
        ?>

    </body>
</html>