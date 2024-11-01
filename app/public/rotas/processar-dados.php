<?php
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $assunto = $_POST['assunto'];
    $mensagem = $_POST['mensagem'];

    $data = array("nome" => $nome, "email" => $email, "assunto" => $assunto , "mensagem" => $mensagem);
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'POST',
            'content' => json_encode($data),
        ),
    );
    $context  = stream_context_create($options);
     $url = 'http://localhost/site/api/api.php/suporte';
    //$url = 'https://hearmeout.informatica3c.com.br/api/api.php/suporte';

    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        echo "<p>Erro ao preencher formulario.</p>";
    } else { 
    ?>
        <script>
            // Exibe o alerta
            alert('Preenchido com sucesso!');

            // Após o usuário clicar em "OK", redireciona para outra página
            window.location.href = '../src/suporte.php'; // Altere para a página de destino
        </script>
    <?php
    }

 }

    
    

    

