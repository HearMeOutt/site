<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <link rel="stylesheet" href="../assets/css/header.css">
    </head>
    <body>
        <header>
            <div class="nav-bar">
                <div class="logo" id="logo">
                    <a href="index.php"><img src="../assets/img/logoHearMeOut.png" alt=""></a>
                </div>
                <nav class="menu" id="menu">
                    <a href="index.php" class="itens_nav">PÁGINA INICIAL</a>
                    <a href="introducao.php" class="itens_nav">INTRODUÇÃO À LIBRAS</a>
                    <a href="suporte.php" class="itens_nav">SUPORTE</a>
                    <?php
                        if($logado == false){
                            ?>
                                <a href="login.php" class="btn_entrar">ENTRAR</a>
                                <a href="cadastro.php" class="btn_cadastrar">CADASTRAR</a>
                            <?php
                        }
                        else{
                            ?>
                                <a href="perfil.php"><i class="fa-solid fa-user item_profile"></i></a>
                            <?php
                        }
                    ?>
                    
                </nav>
            </div>
        </header>
    </body>
</html>