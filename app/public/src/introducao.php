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
                    <div class="container_modulos">
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
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>