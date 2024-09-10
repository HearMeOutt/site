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
                    <h1 class="MontserratBold">Faça Login</h1>
                </div>
                <form action="" class="forms_login">
                    <div class="inputs_form">
                        <input type="text" name="email" id="email" class="MontserratRegular" placeholder="Digite se e-mail">
                        <input type="password" name="senha" id="senha" class="MontserratRegular" placeholder="Digite sua senha">
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
    </body>
</html>