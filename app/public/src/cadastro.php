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
            <div class="login_cadastro">
                <div class="titulo">
                    <h1 class="MontserratBold">Cadastro</h1>
                </div>
                <form action="../rotas/cadastro_usuario.php" method="POST" class="forms_login">
                    <div class="inputs_form">
                        <input type="text" name="nome" id="nome" class="MontserratRegular" placeholder="Digite seu nome">
                        <input type="text" name="email" id="email" class="MontserratRegular" placeholder="Digite se e-mail">
                        <input type="password" name="senha" id="senha" class="MontserratRegular" placeholder="Digite sua senha">
                        <input type="password" name="confirmar_senha" id="confirmar_senha" class="MontserratRegular" placeholder="Confirme a senha">
                        <div class="politica">
                            <input type="checkbox" name="politica_privacidade" id="politica_privacidade">
                            <h2 class="MontserratRegular">Li e aceito a <a href="">política de privacidade</a></h2>
                        </div>
                    </div>
                    <div class="btn_form">
                        <button class="btn_entrar MontserratBold" type="submit">Cadastrar</button>
                    </div>
                </form>
                <div class="cadastro">
                    <h2 class="MontserratRegular">Já possui conta? <a href="login.php">Faça login</a></h2>
                </div>
            </div>
        </div>
    </body>
</html>