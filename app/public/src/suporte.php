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
<?php
    $id_usuario = $_SESSION['id_usuario'];
    //$url = "http://localhost/site/api/api.php/usuarios/id/{$id_usuario}";
    $url = "https://https://hearmeout.informatica3c.com.br/api/api.php/usuarios/id/{$id_usuario}";
    $response = file_get_contents($url);
    $data = json_decode($response, true);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <?php
            include ('../assets/components/head.php')
        ?>
        <link rel="stylesheet" href="../assets/css/suporte.css">
    </head>
    <body>
        <?php
            include ('../assets/components/header.php')
        ?>
        <div class="container">
            <div class="titulo_suporte">
                <h1 class="MontserratRegular">Suporte</h1>
            </div>
            <div class="container_suporte">
                <h2 class="MontserratRegular">Contato</h2>
                <form action="https://formsubmit.co/sachearmeout@gmail.com" method="POST" class="form_contato">
                    <input type="hidden" class="txt" name="_next" value="https://hearmeout.informatica3c.com.br/app/public/src/enviado.php">
                    <input type="hidden" name="_captcha" value="false">
                    <input type="text" class="txt MontserratRegular" id="nome" name="name" placeholder="Digite seu nome:" class="corpo" required>
                    <input type="email" class="txt MontserratRegular" id="email" name="email" placeholder="Digite seu e-mail:" class="corpo" required>
                    <input type="text" class="txt MontserratRegular" id="assunto" name="_subject" placeholder="Digite o assunto:" class="corpo" required>
                    <textarea type="text" class="txt MontserratRegular" id="mensagem" name="mensagem" placeholder="Mensagem:" class="corpo" rows="6" cols="50" required></textarea>
                    <input type="submit" class="btn_enviar MontserratRegular" value="ENVIAR" class="btn_enviar">
                </form>
            </div>
        </div>

        <?php
            include ('../assets/components/footer.php')
        ?>
    </body>
</html>