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
            <a href="javascript:history.back()" class="voltar"><i class="fa-solid fa-angle-left"></i></a>
            <div class="container_esquerda">
            <img src="../assets/img/login.png" alt="">
            </div>
            <div class="login_cadastro">
                <div class="titulo">
                    <h1 class="MontserratBold">Cadastro</h1>
                </div>
                <form action="../rotas/cadastro_usuario.php" method="POST" class="forms_cadastro" id="forms_cadastro">
                    <div class="inputs_form">
                        <div class="item_forms">
                            <input type="text" name="nome" id="nome" class="MontserratRegular" placeholder="Digite seu nome">
                            <span class="MontserratRegular" id="span_nome">Informar um nome</span>
                            <span class="MontserratRegular" id="span_nome_errado">O nome deve conter mais de 3 letras</span>
                        </div>
                        <div class="item_forms">
                            <input type="text" name="email" id="email" class="MontserratRegular" placeholder="Digite seu e-mail">
                            <span class="MontserratRegular" id="span_email">Informar um email</span>
                            <span class="MontserratRegular" id="span_email_valido">Informar um email válido</span>
                        </div>
                        <div class="item_forms">
                            <input type="text" name="telefone" id="telefone" class="MontserratRegular" placeholder="Digite seu telefone">
                            <span class="MontserratRegular" id="span_telefone">Informar um telefone</span>
                            <span class="MontserratRegular" id="span_telefone_valido">Informar um telefone válido</span>
                        </div>
                        <div class="item_forms">
                            <div class="senha_">
                                <input type="password" name="senha" id="senha" class="MontserratRegular" placeholder="Digite sua senha">
                                <i id="olho" class="fa-solid fa-eye-slash" onclick="versenha()"></i>
                            </div>
                            <span class="MontserratRegular" id="span_senha">Informar uma senha</span>
                            <span class="MontserratRegular" id="span_senha_valida">A senha deve ter ao menos 8 dígitos</span>
                            <span class="MontserratRegular" id="span_senha_segura">A senha deve ter ao menos uma letra maiúscula uma minuscula um numero e um caracter especial</span>
                        </div>
                        <div class="item_forms">
                            <div class="senha_">
                                <input type="password" name="confirmar_senha" id="confirmar_senha" class="MontserratRegular" placeholder="Confirme a senha">
                                <i id="olhoconfirmar" class="fa-solid fa-eye-slash" onclick="verconfirmarsenha()"></i>
                            </div>
                            <span class="MontserratRegular" id="span_confirmar_senha">Confirmar senha</span>
                            <span class="MontserratRegular" id="span_senha_diferente">A senha não é igual</span>
                        </div>
                        <div class="item_forms">
                            <div class="politica">
                                <input type="checkbox" class="checkbox" name="politica_privacidade" id="politica_privacidade">
                                <h2 class="MontserratRegular">Li e aceito a <a href="">política de privacidade</a></h2>
                            </div>
                            <span class="MontserratRegular" id="span_politica_privacidade">É preciso aceitar os termos</span>
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
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
        <script src="../assets/js/cadastro.js"></script>
    </body>
</html>