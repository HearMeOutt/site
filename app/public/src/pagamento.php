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
    $id_curso = $_GET['curso'];

    $url = "http://localhost/site/api/api.php/cursos/id/{$id_curso}";
    //$url = "https://hearmeout.informatica3c.com.br/api/api.php/cursos/id/{$id_curso}";
    $response = file_get_contents($url);
    $data = json_decode($response, true);
?>
<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <?php
            include ('../assets/components/head.php')
        ?>
        <link rel="stylesheet" href="../assets/css/pagamento.css">
    </head>
    <body>
        <?php
            include ('../assets/components/header.php')
        ?>
        <div class="container">
            <div class="titulo_pagamento">
                <h1 class="Michroma">Inscrição módulo: <?php echo($data['dados']['nome']); ?></h1>
            </div>
            <div class="container_pagamento">
                <div class="valor">
                    <h2 class="MontserratBold">Valor: R$<?php echo($data['dados']['valor']); ?></h2>
                </div>
                <form action="../rotas/executa_compra_curso.php" class="metodo_pagamento" method="POST">
                    <select id="payment-method" name="payment-method" class="payment-method" onchange="showPixInfo()">
                        <option class="MontserratRegular" value="" disabled selected>Selecione o método de pagamento</option>
                        <option class="MontserratRegular" value="pix">PIX</option>
                        <option class="MontserratRegular" value="cartao">Cartão de Crédito</option>
                        <option class="MontserratRegular" value="boleto">Boleto</option>
                    </select>
                    <input class="none" type="text" name="id_curso" value="<?php echo($data['dados']['id_curso']); ?>">
                    <input class="none" type="text" name="id_usuario" value="<?php echo($_SESSION['id_usuario']); ?>">
                    <div id="pix-info" class="pix_info">
                        <img src="../assets/img/QRCode.png" alt="QR Code para pagamento via PIX">
                        <p class="MontserratBold chave_pix"><strong>Chave PIX:</strong> 470.490.238-25</p>
                    </div>
                    <button class="MontserratBold btn_concluir" type="submit">CONCLUIR</button>
                </form>
            </div>
        </div>
        <script>
            function showPixInfo() {
                var paymentMethod = document.getElementById("payment-method").value;
                var pixInfo = document.getElementById("pix-info");

                if (paymentMethod === "pix") {
                    pixInfo.style.display = "flex";
                } else {
                    pixInfo.style.display = "none";
                }
            }
        </script>
        <?php
            include('../assets/components/footer.php');
        ?>
    </body>
</html>