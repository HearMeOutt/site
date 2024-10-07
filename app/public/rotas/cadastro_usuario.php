<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $senha_hash = password_hash($senha,PASSWORD_DEFAULT);

        $data = array("nome" => $nome, "email" => $email, "senha" => $senha_hash);
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data),
            ),
        );

        $context  = stream_context_create($options);
        $url = 'http://hearmeout.informatica3c.com.br/api/api.php/usuario';
        $result = file_get_contents($url, false, $context);

        if ($result === FALSE) {
            echo "<p>Erro ao adicionar aluno.</p>";
        } else { 
        ?>
            <script>
                // Exibe o alerta
                alert('Cadastrado com sucesso!');

                // Após o usuário clicar em "OK", redireciona para outra página
                window.location.href = '../src/login.php'; // Altere para a página de destino
            </script>
        <?php
        }
    }
?>