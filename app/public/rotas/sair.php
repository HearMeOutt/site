<?php
    session_start();

    unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email'], $_SESSION['telefone']);

    header("location: ../src/index.php")

?>