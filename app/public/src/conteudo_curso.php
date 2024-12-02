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
    
    //$url = "http://localhost/site/api/api.php/matricula/id_usuario/{$id_usuario}";
    $url = "https://hearmeout.informatica3c.com.br/api/api.php/matricula/id_usuario/{$id_usuario}";
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
    
    //$url = "http://localhost/site/api/api.php/cursos/id/{$id_curso}";
    $url = "https://hearmeout.informatica3c.com.br/api/api.php/cursos/id/{$id_curso}";
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

            
            <?php
                $caminho = $data['dados']['nome'];
            
                //$url = "http://localhost/site/api/api.php/aulas/id_curso/{$id_curso}";
                $url = "https://hearmeout.informatica3c.com.br/api/api.php/aulas/id_curso/{$id_curso}";
                $response = file_get_contents($url);
                $data = json_decode($response, true);

                if (isset($data['dados']) && count($data['dados']) > 0) {
                    ?>
                    <div class="aula" id="aulaInfo">
                        <div class="titulo_aula">
                            <h1 class="Michroma">Aula <?php echo($data['dados'][0]['numero_aula']); ?> - <?php echo htmlspecialchars($data['dados'][0]['nome']); ?></h1>
                        </div>
                        <div class="videoaula">
                            <video src="../conteudo/<?php echo($caminho); ?>/video/<?php echo($data['dados'][0]['videoaula']); ?>.mp4" controls></video>
                        </div>
                        <div class="btns_aula">
                            <a id='anteriorBtn'class="MontserratRegular" onclick="mostrarAulaAtual(-1)" style="display: none;">Aula anterior</a>
                            <a id='proximoBtn' class="MontserratRegular" onclick="mostrarAulaAtual(1)">Próxima Aula</a>
                        </div>
                        <div class="btn_pdf_ia">
                            <a href="../conteudo/<?php echo($caminho); ?>/pdf/<?php echo($caminho); ?>.pdf" target="_blank" class="MontserratRegular">Baixar PDF completo do módulo</a>
                            <?php
                                if(($caminho == 'Alfabeto em libras')){
                                    ?>
                                        <a href="correcao_alfabeto.php?id=<?php echo($id_curso); ?>" class="MontserratRegular">Iniciar correção com IA</a>
                                    <?php
                                }
                            ?>
                        </div>
                    </div>

                    <?php
                } else {
                    echo '<p>Nenhuma aula encontrada.</p>';
                }
            ?>

            <script>
                var aulas = <?php echo json_encode($data['dados']); ?>;
                var totalAulas = aulas.length;
                var aulaAtual = 0;

                function atualizarExibicaoAula() {
                    var aulaAtualData = aulas[aulaAtual];

                    // Atualizar título
                    document.querySelector(".titulo_aula h1").innerHTML = "Aula " + aulaAtualData.numero_aula + " - " + aulaAtualData.nome;

                    // Atualizar vídeo
                    var video = document.querySelector(".videoaula video");
                    video.src = "../conteudo/<?php echo($caminho); ?>/video/" + aulaAtualData.videoaula + ".mp4";

                    // Exibir ou ocultar botões conforme a posição da aula
                    document.getElementById("anteriorBtn").style.display = aulaAtual > 0 ? "inline-block" : "none";
                    document.getElementById("proximoBtn").style.display = aulaAtual < totalAulas - 1 ? "inline-block" : "none";
                }

                function mostrarAulaAtual(direcao) {
                    aulaAtual += direcao;
                    if (aulaAtual < 0) aulaAtual = 0;
                    if (aulaAtual >= totalAulas) aulaAtual = totalAulas - 1;
                    atualizarExibicaoAula();
                }

                // Inicializar a exibição
                atualizarExibicaoAula();
            </script>
                
        </div>
        <?php
            include('../assets/components/footer.php');
        ?>
    </body>
</html>