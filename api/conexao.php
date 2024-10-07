<?php
    $host = 'localhost';
    $usuario = 'u301136860_root';
    $senha = 'HearMeOut@123';
    $banco = 'u301136860_hearmeout';

    $conexao = new mysqli ($host, $usuario, $senha, $banco);

    if($conexao->connect_error){
        die('Falha de conexão: ' . $conexao->connect_error);
    }
    //else{
        //echo "CONECTADO";
    //}
?>