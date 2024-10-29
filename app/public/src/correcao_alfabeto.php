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
    //$url = "https://hearmeout.informatica3c.com.br/api/api.php/matricula/id_usuario/{$id_usuario}";
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
    //$url = "https://hearmeout.informatica3c.com.br/api/api.php/cursos/id/{$id_curso}";
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    $caminho = $data['dados']['nome'];
?>

<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <?php
            include ('../assets/components/head.php')
        ?>
        <link rel="stylesheet" href="../assets/css/correcao_alfabeto.css">
        
        <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js"></script>
        <script src="../assets/IA/Alfabeto em Libras/AB/AB.js"></script>

        <script>
            
        </script>
    </head>
    <body>
        <?php
            include ('../assets/components/header.php')
        ?>
        <div class="container">
            <a href="javascript:history.back()" class="voltar"><i class="fa-solid fa-angle-left"></i></a>
            <div class="titulo_teste">
                <h1 class="MontserratBold">Hora de praticar o que você aprendeu!</h1>
            </div>
            <div class="instrucao">
                <h2 class="MontserratBold">Faça o sinal até a letra ficar verde</h2>
            </div>
            <div class="container_teste">
                <div class="container_camera">
                    <div class="camera" id="camera">
                        <div id="webcam-container" class="webcam"></div>
                    </div>
                    <div class="identificado">
                        <h1 class="MontserratBold" id="identificado">Sinal identificado</h1>
                    </div>  
                </div>
                <div class="resultado">
                    <div class="imagem-container">
                        <img id="letra-imagem1" src="../assets/img/alfabeto/A.png" alt="Imagem da letra A" />
                        <img id="letra-imagem2" src="../assets/img/alfabeto/B.png" alt="Imagem da letra B" />
                    </div>
                    <div class="container_numero">
                        <div id="label-container" class="MontserratRegular"></div>
                    </div>
                    <div class="container_btn">
                        <button type="button" class="Montserrat" id="prevButton" onclick="previousLetter()">Letra Anterior</button>
                        <button type="button" class="Montserrat" onclick="init()">Começar</button>
                        <button type="button" class="Montserrat" id="nextButton" onclick="nextLetter()">Próxima Letra</button>
                    </div>
                </div>
            </div> 
        </div>
        <?php
            include('../assets/components/footer.php');
        ?>

        
    </body>
</html>