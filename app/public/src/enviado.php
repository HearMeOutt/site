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
    </head>
    <body>
        
    </body>
</html>