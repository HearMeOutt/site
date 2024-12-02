<?php
    session_start();
    $is_invalid = false;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email_login = $_POST['email'];
        $senha_login = $_POST['senha'];

        //$url = "http://localhost/site/api/api.php/usuarios/email/{$email_login}";
        $url = "https://hearmeout.informatica3c.com.br/api/api.php/usuarios/email/{$email_login}";
        $response = file_get_contents($url);
        $data = json_decode($response, true);


        if(!empty($data['dados']['email'])){
            //echo 'email encontrado';
            //echo $data['dados']['email'];
            if(password_verify(($senha_login),$data['dados']['senha'])){
                $_SESSION['id_usuario'] = $data['dados']['id_usuario'];
                echo 'login realizado com sucesso';
                header('Location: index.php');
            }else{
                $is_invalid = true;
                //echo 'senha inválida';
            }
        }else{
            $is_invalid = true;
            //echo 'email ou senha inválidos';
        }

    }
?>
<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <?php
            include('../assets/components/head.php');
        ?>
        <link rel="stylesheet" href="../assets/css/login_cadastro.css">
    </head>
    <body>
        <div class="content">
            <a href="index.php" class="voltar"><i class="fa-solid fa-angle-left"></i></a>
            <div class="container_esquerda">
                <img src="../assets/img/login.png" alt="">
            </div>
            <div class="login_cadastro">
                <div class="titulo">
                    <h1 class="MontserratBold">Faça Login</h1>
                </div>
                <form method="POST" class="forms_login" id="forms_login">
                    <div class="inputs_form">
                        <?php if($is_invalid): ?>
                            <p class="MontserratRegular vermelho">Email ou senha inválido</p>
                        <?php endif; ?>
                        <input type="text" value="<?= htmlspecialchars($_POST['email'] ?? "") ?>" name="email" id="email" class="MontserratRegular" placeholder="Digite se e-mail">
                        <div class="senha_">
                            <input type="password" value="<?= htmlspecialchars($_POST['senha'] ?? "") ?>" name="senha" id="senha" class="MontserratRegular" placeholder="Digite sua senha">
                            <i id="olho" class="fa-solid fa-eye-slash" onclick="versenha()"></i>
                        </div>
                        
                    </div>
                    <div class="btn_form">
                        <button class="btn_entrar MontserratBold" type="submit">ENTRAR</button>
                    </div>
                </form>
                <div class="cadastro">
                    <h2 class="MontserratRegular">Ainda não possui uma conta? <a href="cadastro.php">Cadastre-se já</a></h2>
                </div>
            </div>
        </div>
        <script>

            //!olho para ver a senha
            const olho = document.getElementById('olho');
            const senha = document.querySelector("#senha");

            function versenha(){
                if(senha.getAttribute('type') == 'password'){
                    senha.setAttribute('type','text');
                    olho.classList.add('fa-eye');
                }else{
                    senha.setAttribute('type','password');
                    olho.classList.remove('fa-eye');
                }
            }
        </script>
    </body>
</html>