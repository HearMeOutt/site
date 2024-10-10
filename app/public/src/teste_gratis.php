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
        <link rel="stylesheet" href="../assets/css/teste_gratis.css">
    </head>
    <body>
        <?php
            include ('../assets/components/header.php')
        ?>
        <div class="container">
            <a href="javascript:history.back()" class="voltar"><i class="fa-solid fa-angle-left"></i></a>
            <div class="titulo_teste">
                <h1 class="MontserratBold">Faça o teste grátis!</h1>
            </div>
            <div class="instrucao">
                <h2 class="MontserratBold">Mostre na câmera uma quantidade de dedos de 1 a 5 e será identificado ao lado</h2>
            </div>
            <div class="container_teste">
                <div class="container_camera">
                    <div class="camera" id="camera">
                        <div id="webcam-container" class="webcam"></div>
                    </div>
                </div>
                <div class="resultado">
                    <div class="container_numero">
                        <div id="label-container" class="MontserratRegular"></div>
                    </div>
                    <div class="container_btn">
                        <button type="button" onclick="init()">Começar</button>
                    </div>
                </div>
            </div>
            <div class="identificado">
                <h1 class="MontserratBold" id="identificado">Sinal identificado</h1>
            </div>   
        </div>
        <?php
            include('../assets/components/footer.php');
        ?>

        <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js"></script>
        <script src="../assets/IA/numeros/numeros.js"></script>
    </body>
</html>