<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_usuario = $_POST['id_usuario'];
        $id_curso = $_POST['id_curso'];


        $data = array("fk_usuarios_id_usuario" => $id_usuario, "fk_cursos_id_curso" => $id_curso);
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data),
            ),
        );

        $context  = stream_context_create($options);
        $url = 'http://localhost/site/api/api.php/matricula';
        //$url = 'https://hearmeout.informatica3c.com.br/api/api.php/matricula';
        $result = file_get_contents($url, false, $context);

        echo($result);
        echo($id_curso);

        if ($result === FALSE) {
            echo "<p>Erro ao comprar curso</p>";
        } else { 
        ?>
            <script>
                // Exibe o alerta
                alert('Curso comprado com sucesso!');

                // Após o usuário clicar em "OK", redireciona para outra página
                window.location.href = '../src/minhas_assinaturas.php'; // Altere para a página de destino
            </script>
        <?php
        }
    }
?>