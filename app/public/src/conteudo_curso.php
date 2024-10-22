<?php
    session_start();
    if((!isset($_SESSION['id_usuario']) == true)){
        unset($_SESSION['id_usuario']);

        //echo 'deslogado';
        $logado = false;

        header('location: index.php');
    }else{
        //echo 'logado';
        $logado = true;
    }
?>
<?php
    $id_usuario = $_SESSION['id_usuario'];
    $id_curso = $_GET['id'];
    
    $url = "http://localhost/site/api/api.php/matricula/id_usuario/{$id_usuario}";
    // $url = "https://hearmeout.informatica3c.com.br/api/api.php/matricula/id_usuario/{$id_usuario}";
    $response = file_get_contents($url);
    $data = json_decode($response, true);
    
    // Verifica se o usuário tem matrículas
    if (isset($data['dados']) && is_array($data['dados'])) {
        $curso_encontrado = false; // Variável de controle
    
        foreach ($data['dados'] as $matricula) {
            $curso = $matricula['fk_cursos_id_curso'];
            
            // Verifica se o curso corresponde
            if ($id_curso == $curso) {
                $curso_encontrado = true;
                break; // Curso encontrado, interrompe o loop
            }
        }
    
        // Verifica a variável de controle
        if ($curso_encontrado) {
            //echo 'Curso encontrado';
        } else {
            //echo 'Curso não encontrado';
            header('location: index.php');
        }
    } else {
        echo 'Nenhuma matrícula encontrada.';
    }
?>
<?php
    $id_curso = $_GET['id'];
    
    $url = "http://localhost/site/api/api.php/cursos/id/{$id_curso}";
    // $url = "https://hearmeout.informatica3c.com.br/api/api.php/cursos/id/{$id_curso}";
    $response = file_get_contents($url);
    $data = json_decode($response, true);

?>
<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <?php
            include ('../assets/components/head.php')
        ?>
        <link rel="stylesheet" href="../assets/css/conteudo_curso.css">
    </head>
    <body>
        <?php
            include ('../assets/components/header.php')
        ?>
        <div class="container">
            <div class="titulo_curso">
                <h1 class="Michroma">Seja bem-vindo (a) ao Módulo: <?php echo($data['dados']['nome']); ?></h1>
            </div>
            <div class="infos_curso">
                <div class="img_curso">
                    <img src="../assets/img/<?php  echo($data['dados']['nome']); ?>.png" alt="<?php echo($data['dados']['nome']); ?>">
                </div>
                <div class="txt_libras">
                    <p class="MontserratRegular"><?php echo($data['dados']['descricao']); ?></p>
                </div>
            </div>
            <div class="aula">
                <div class="titulo_aula">
                    <h1 class="Michroma">Aula 1 - Introdução a Libras</h1>
                </div>
                <div class="videoaula">
                    <video src="../conteudo/teórico/video/aula1.mp4" controls></video>
                </div>
                <div class="btns_aula">
                    <a href="" class="MontserratRegular">Aula anterior</a>
                    <a href="" class="MontserratRegular">Avançar</a>
                </div>
                <div class="btn_pdf_ia">
                    <a href="../conteudo/teórico/pdf/Teórico.pdf" target="_blank" class="MontserratRegular">Baixar PDF completo do módulo</a>
                    <a href="" class="MontserratRegular">Iniciar correção com IA</a>    
                </div>
            </div>
        </div>
        <?php
            include('../assets/components/footer.php');
        ?>
    </body>
</html>