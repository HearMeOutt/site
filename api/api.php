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
    $setimaparte = isset($path_parts[6]) ? $path_parts[6] : '';

    $resposta = [
        'metodo' => $metodo,
        'primeiraparte' => $primeiraparte,
        'segundaparte' => $segundaparte,
        'terceiraparte' => $terceiraparte,
        'quartaparte' => $quartaparte,
        'quintaparte' => $quintaparte,
        'sextaparte' => $sextaparte,
        'setimaparte' => $setimaparte,
    ];

    //echo json_encode($resposta);

    switch($metodo){
        case 'GET':
            break;
        
        case 'POST':
            if ($quintaparte = 'usuario'){
                insere_usuario();
            }
            break;
            
        case 'PUT':
            break;
        
        case 'DELETE':
            break;
        
        default:
            echo json_encode([
                'mensagem' => 'Método não permitido!'
            ]);
            break;
    }

    function insere_usuario(){
        global $conexao;
        $input = json_decode(file_get_contents('php://input'), true);
        $nome = $input['nome'];
        $email = $input['email'];
        $senha = $senha['senha'];

        $sql = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

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

?>