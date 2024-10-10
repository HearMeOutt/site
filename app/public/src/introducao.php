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
        <link rel="stylesheet" href="../assets/css/introducao.css">
    </head>
    <body>
        <?php
            include ('../assets/components/header.php')
        ?>
        <div class="container">
            <!-- !Introdução! -->
            <div class="introducao">
                <div class="titulo Michroma">
                    <h1>INTRODUÇÃO A LIBRAS:</h1>
                </div>

                <div class="modulos">
                    <!-- <div class="container_modulos">
                        <div class="card_modulo card1">
                            <div class="img_card">
                                <img src="../assets/img/alfabeto.png" alt="Letras do alfabeto">
                            </div>
                            <div class="nome_modulo">
                                <h2 class="Michroma">Alfabeto em libras</h2>
                            </div>
                            <div class="btn_view">
                                <a href="alfabeto_modulo.php" class="visualizar Michroma">VISUALIZAR</a>
                            </div>
                        </div>
                        <div class="card_modulo card2">
                            <div class="img_card">
                                <img src="../assets/img/numeros.png" alt="Números">
                            </div>
                            <div class="nome_modulo">
                                <h2 class="Michroma">Números inicias</h2>
                            </div>
                            <div class="btn_view">
                                <a href="numeros_modulo.php" class="visualizar Michroma">VISUALIZAR</a>
                            </div>
                        </div>
                        <div class="card_modulo card3">
                            <div class="img_card">
                                <div class="gear">
                                    <img src="https://assets.codepen.io/6093409/gear.svg.png" alt="an illustration of a gear" />
                                </div>
                            </div>
                            <div class="nome_modulo">
                                <h2 class="Michroma">Em desenvolvimento</h2>
                            </div>
                        </div>
                    </div> -->

                    <div class="modulo_libras">
                        <div class="img_libras">
                            <img src="../assets/img/alfabeto.png" alt="Letras do alfabeto">
                        </div>
                        <div class="info_libras">
                            <div class="titulo_libras">
                                <h1 class="MontserratBold">Módulo: Alfabeto em libras</h1>
                            </div>
                            <div class="txt_libras">
                                <p class="MontserratRegular">O módulo do alfabeto em Libras oferece uma introdução prática e interativa às letras, ensinando você a soletrar e reconhecer cada uma delas com precisão. Com exercícios dinâmicos e feedback instantâneo, você vai ganhar confiança na comunicação básica em Libras, de forma rápida e acessível. Ideal para iniciantes!</p>
                            </div>
                            <div class="btn_libras">
                                <a href="modulo_alfabeto.php" class="visualizar MontserratRegular">VISUALIZAR</a>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="card_modulo card3">
                        <div class="img_card">
                            <div class="gear">
                                <img src="https://assets.codepen.io/6093409/gear.svg.png" alt="an illustration of a gear" />
                            </div>
                        </div>
                        <div class="nome_modulo">
                            <h2 class="Michroma">Em desenvolvimento</h2>
                        </div>
                    </div> -->

                </div>
            </div>
        </div>
        <?php
            include('../assets/components/footer.php');
        ?>
    </body>
</html>