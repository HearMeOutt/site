<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $data = array("nome" => $nome, "email" => $email, "senha" => $senha);
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data),
            ),
        );

        $context  = stream_context_create($options);
        $url = 'http://localhost/site/app/public/src/cadastro.php/usuario';
        $result = file_get_contents($url, false, $context);

        if ($result === FALSE) {
            echo "<p>Erro ao adicionar usuario.</p>";
        } 
    }
    ?>