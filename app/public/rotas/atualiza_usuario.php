<?php
    session_start();
    if((!isset($_SESSION['id_usuario']) == true) and (!isset($_SESSION['nome']) == true) and (!isset($_SESSION['email']) == true)){
        unset($_SESSION['id_usuario']);
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
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_usuario = $_SESSION['id_usuario'];
        $nome_novo_usuario = $_POST['nome_novo'];
        $email_novo_usuario = $_POST['email_novo'];
        $telefone_novo_usuario = $_POST['telefone_novo'];

        $data = array("id_usuario" => $id_usuario , "nome_novo" => $nome_novo_usuario, "email_novo" => $email_novo_usuario, "telefone_novo" => $telefone_novo_usuario);
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'PUT',
                'content' => json_encode($data),
            ),
        );

        $context  = stream_context_create($options);
        $url = 'http://localhost/site/api/api.php/usuarios';
        //$url = 'http://https://hearmeout.informatica3c.com.br/api/api.php/usuarios';
        $result = file_get_contents($url, false, $context);

        if ($result === FALSE) {
            echo "<p>Erro ao atualizar usuario.</p>";
        } else { ?>
            <script>
                // Exibe o alerta
                alert('Perfil atualizado com sucesso!');

                // Após o usuário clicar em "OK", redireciona para outra página
                window.location.href = '../src/perfil.php'; // Altere para a página de destino
            </script>
        <?php    
        }
    }
?>