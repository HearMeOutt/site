<?php
    session_start();

    unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email']);

    header("location: ../src/index.php")

?>