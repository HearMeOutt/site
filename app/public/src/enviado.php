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
    </head>
    <body>
        
    </body>
</html>