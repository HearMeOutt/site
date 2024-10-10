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

    /* // !SERVIDOR!
    switch($metodo){
        case 'GET':
            if ($terceiraparte = 'usuario' && $quartaparte = 'email' && $quintaparte != ''){
                GetAlunosByEmail($quintaparte);
            }
            break;
        
        case 'POST':
            if ($terceira = 'usuario'){
                PostUsuario();
            }
            break;
            
        case 'PUT':
            if ($terceira = 'usuarios'){
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
    } */
    
    // !LOCAL!
    switch($metodo){
        case 'GET':
            if ($quartaparte = 'usuarios' && $quintaparte = 'email' && $sextaparte != ''){
                GetAlunosByEmail($sextaparte);
            }
            break;
        
        case 'POST':
            if ($quartaparte = 'usuarios'){
                PostUsuario();
            }
            break;
            
        case 'PUT':
            if ($quartaparte = 'usuarios'){
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
    //function GetAlunosByEmail($quintaparte)
    function GetAlunosByEmail($sextaparte){
        global $conexao;
        //$stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email = '$quintaparte'");
        $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email = '$sextaparte'");
        $stmt->execute();
        $resultado = $stmt->get_result();
        $usuario = $resultado->fetch_assoc();
        
        echo json_encode([
            'mensagem' => 'Infos usuário',
            'dados' => $usuario
        ]);
    }


    //!POST
    function PostUsuario(){
        global $conexao;
        $input = json_decode(file_get_contents('php://input'), true);
        $nome = $input['nome'];
        $email = $input['email'];
        $telefone = $input['telefone'];
        $senha = $input['senha'];

        echo($senha);

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