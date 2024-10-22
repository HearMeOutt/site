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

                    <?php 
                        $url = 'http://localhost/site/api/api.php/cursos';
                        // $url = 'https://hearmeout.informatica3c.com.br/api/api.php/cursos';
                        $response = file_get_contents($url);
                        $data = json_decode($response, true);

                        if (isset($data['dados'])) {
                            foreach ($data['dados'] as $cursos) {
                                ?>
                                    <div class="modulos_cards">
                                        <div class="img_libras">
                                            <img src="../assets/img/<?php echo($cursos['nome']); ?>.png" alt="<?php echo($cursos['nome']); ?>">
                                        </div>
                                        <div class="info_libras">
                                            <div class="titulo_libras">
                                                <h1 class="MontserratBold">Módulo: <?php echo($cursos['nome']); ?></h1>
                                            </div>
                                            <div class="txt_libras">
                                                <p class="MontserratRegular"><?php echo($cursos['descricao']); ?></p>
                                            </div>
                                            <div class="btn_libras">
                                                <a href="<?php if($logado == true){echo("pagamento.php?curso=".$cursos['id_curso']);}else{echo('login.php');}?>" class="btn_comprar MontserratRegular">R$ <?php echo($cursos['valor']); ?></a>
                                                <a href="modulo_teorico.php" class="visualizar MontserratRegular">VISUALIZAR</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            }
                        } else {
                            echo '<p>Nenhum aluno encontrado.</p>';
                        }
                    ?>

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