<?php
    header('Content-Type: application/json');
    include 'conexao.php';

    $metodo = $_SERVER['REQUEST_METHOD'];
    

    $url = $_SERVER['REQUEST_URI'];
    
    $path = parse_url($url, PHP_URL_PATH);
    $path = trim($path,'/');    

    $path_parts = explode('/',$path);
    

    $primeiraparte = isset($path_parts[0]) ? $path_parts[0] : '';
    $segundaparte = isset($path_parts[1]) ? $path_parts[1] : '';
    $terceiraparte = isset($path_parts[2]) ? $path_parts[2] : '';
    $quartaparte = isset($path_parts[3]) ? $path_parts[3] : '';
    $quintaparte = isset($path_parts[4]) ? $path_parts[4] : '';
    $sextaparte = isset($path_parts[5]) ? $path_parts[5] : '';

    $resposta = [
        'metodo' => $metodo,
        'primeiraparte' => $primeiraparte,
        'segundaparte' => $segundaparte,
        'terceiraparte' => $terceiraparte,
        'quartaparte' => $quartaparte,
        'quintaparte' => $quintaparte,
        'sextaparte' => $sextaparte
    ];

    //echo json_encode($resposta);

    /*
    switch($metodo){
        case 'GET':
            if ($terceiraparte == 'usuarios' && $quartaparte == 'email' && $quintaparte != ''){
                GetAlunosByEmail($quintaparte);
            }
            if ($terceiraparte == 'usuarios' && $quartaparte == 'id' && $quintaparte != ''){
                GetAlunosByID($quintaparte);
            }
            if ($terceiraparte == 'cursos' && $quartaparte == ''){
                GetCursos();
            }
            if ($terceiraparte == 'cursos' && $quartaparte == 'id' && $quintaparte != ''){
                GetCursosByID($quintaparte);
            }
            if ($terceiraparte == 'matricula' && $quartaparte == 'id_usuario' && $quintaparte != ''){
                GetMatriculaByIDUsuario($quintaparte);
            }
            break;
        
        case 'POST':
            if ($terceiraparte == 'usuarios'){
                PostUsuario();
            }
            if ($terceiraparte == 'matricula'){
                PostMatricula();
            }
            break;
            
        case 'PUT':
            if ($terceiraparte == 'usuarios'){
                PutUsuario();
            }
            break;
        
        case 'DELETE':
            break;
        
        default:
            echo json_encode([
                'mensagem' => 'Método não permitido!'
            ]);
            break;
    }
    */
    
    // !LOCAL!
    switch($metodo){
        case 'GET':
            if ($quartaparte == 'usuarios' && $quintaparte == 'email' && $sextaparte != ''){
                GetAlunosByEmail($sextaparte);
            }
            if ($quartaparte == 'usuarios' && $quintaparte == 'id' && $sextaparte != ''){
                GetAlunosByID($sextaparte);
            }
            if ($quartaparte == 'cursos' && $quintaparte == ''){
                GetCursos();
            }
            if ($quartaparte == 'cursos' && $quintaparte == 'id' && $sextaparte != ''){
                GetCursosByID($sextaparte);
            }
            if ($quartaparte == 'matricula' && $quintaparte == 'id_usuario' && $sextaparte != ''){
                GetMatriculaByIDUsuario($sextaparte);
            }
            if ($quartaparte == 'aulas' && $quintaparte == 'id_curso' && $sextaparte != ''){
                GetAulaByIDModulo($sextaparte);
            }
            break;
        
        case 'POST':
            if ($quartaparte == 'usuarios'){
                PostUsuario();
            }
            if ($quartaparte == 'matricula'){
                PostMatricula();
            }
            break;
            
        case 'PUT':
            if ($quartaparte == 'usuarios'){
                PutUsuario();
            }
            break;
        
        case 'DELETE':
            break;
        
        default:
            echo json_encode([
                'mensagem' => 'Método não permitido!'
            ]);
            break;
    }
    



    //!FUNCTIONS
    //!GET
    //function GetAlunosByEmail($quintaparte){
    function GetAlunosByEmail($sextaparte){
        global $conexao;
        //$stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email = '$quintaparte'");
        $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email = '$sextaparte'");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();
        
        echo json_encode([
            'mensagem' => 'Infos usuario',
            'dados' => $usuario
        ]);
        
    }
    
    //function GetAlunosByID($quintaparte){
    function GetAlunosByID($sextaparte){
        global $conexao;
        //$stmt = $conexao->prepare("SELECT * FROM usuarios WHERE id_usuario = '$quintaparte'");
        $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE id_usuario = '$sextaparte'");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();
        
        echo json_encode([
            'mensagem' => 'Infos usuario',
            'dados' => $usuario
        ]);
    }

    function GetCursos(){
        global $conexao;
        $resultado = $conexao->query("SELECT * FROM cursos");
        $cursos = $resultado->fetch_all(MYSQLI_ASSOC);
        echo json_encode([
            'mensagem' => 'LISTA DE TODOS OS ALUNOS',
            'dados' => $cursos
        ]);
    }

    //function GetCursosByID($quintaparte){
    function GetCursosByID($sextaparte){
        global $conexao;
        //$stmt = $conexao->prepare("SELECT * FROM cursos WHERE id_curso = '$quintaparte'");
        $stmt = $conexao->prepare("SELECT * FROM cursos WHERE id_curso = '$sextaparte'");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $curso = $resultado->fetch_assoc();
        
        echo json_encode([
            'mensagem' => 'Infos curso',
            'dados' => $curso
        ]);
    }

    //function GetMatriculaByIDUsuario($quintaparte){
    function GetMatriculaByIDUsuario($sextaparte){
        global $conexao;
        //$resultado = $conexao->query("SELECT * FROM matriculas WHERE fk_usuarios_id_usuario = $quintaparte");
        $resultado = $conexao->query("SELECT * FROM matriculas WHERE fk_usuarios_id_usuario = $sextaparte");
        $matricula = $resultado->fetch_all(MYSQLI_ASSOC);
        echo json_encode([
            'mensagem' => 'LISTA todas as matriculas vinculadas com o id do usuario',
            'dados' => $matricula
        ]);
    }

    //function GetAulaByIDModulo($quintaparte){
    function GetAulaByIDModulo($sextaparte){
        global $conexao;
        //$stmt = $conexao->prepare("SELECT * FROM aulas WHERE fk_modulo_id_modulo = $quintaparte");
        $stmt = $conexao->prepare("SELECT * FROM aulas WHERE fk_cursos_id_curso = $sextaparte");
        $stmt->execute();
        $resultado = $stmt->get_result();
    
        // Verificar se há aulas para o módulo informado
        if ($resultado->num_rows > 0) {
            $aulas = $resultado->fetch_all(MYSQLI_ASSOC);
            echo json_encode([
                'mensagem' => 'Aulas do módulo',
                'dados' => $aulas
            ]);
        } else {
            echo json_encode([
                'mensagem' => 'Nenhuma aula encontrada para o módulo especificado',
                'dados' => []
            ]);
        }
    }


    //!POST
    function PostUsuario(){
        global $conexao;
        $input = json_decode(file_get_contents('php://input'), true);
        $nome = $input['nome'];
        $email = $input['email'];
        $telefone = $input['telefone'];
        $senha = $input['senha'];

        // echo($senha);

        $sql = "INSERT INTO usuarios (nome,email,telefone,senha) VALUES ('$nome','$email','$telefone','$senha')";

        if($conexao->query($sql) == TRUE){
            echo json_encode([
                'mensagem' => 'USUARIO CADASTRADO COM SUCESSO'
            ]);
        }
        else {
            echo json_encode([
                'mensagem' => 'ERRO NO CADASTRO DO USUARIO'
            ]);
        }
    }

    function PostMatricula(){
        global $conexao;
        $input = json_decode(file_get_contents('php://input'), true);
        $id_usuario = $input['fk_usuarios_id_usuario'];
        $id_curso = $input['fk_cursos_id_curso'];

        $sql = "INSERT INTO matriculas (fk_usuarios_id_usuario,fk_cursos_id_curso) VALUES ('$id_usuario','$id_curso')";

        if($conexao->query($sql) == TRUE){
            echo json_encode([
                'mensagem' => 'Matricula cadastrada com sucesso'
            ]);
        }
        else {
            echo json_encode([
                'mensagem' => 'ERRO NO CADASTRO DA MATRICULA'
            ]);
        }
    }

    //!PUT
    function PutUsuario(){
        global $conexao;
        $input = json_decode(file_get_contents('php://input'), true);
        $id_usuario = $input['id_usuario'];
        $nome_novo = $input['nome_novo'];
        $email_novo = $input['email_novo'];
        $telefone_novo = $input['telefone_novo'];

        $sql = "UPDATE usuarios SET nome = '$nome_novo', email = '$email_novo', telefone = '$telefone_novo' WHERE id_usuario = '$id_usuario'";

        if($conexao->query($sql) == TRUE){
            echo json_encode([
                'mensagem' => 'USUARIO ATUALIZADO COM SUCESSO'
            ]);
        }
        else {
            echo json_encode([
                'mensagem' => 'ERRO ATUALIZAÇÃO DO USUARIO'
            ]);
        }
    }

    //!DELETE

?>