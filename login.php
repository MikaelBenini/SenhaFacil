<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Senha Fácil - Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="icon" type="imagem/png" href="/imagens/favicon.ico" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-masker/1.1.0/vanilla-masker.min.js"></script>
</head>

<body class="sign-in-js">
    <div class="area-cabecalho">
        <div id="area-logo">
            <a href="index">
                <h4 class="branco">SENHA <span class="verde">FÁCIL</span> </h4>
            </a>
        </div>
        <div class="container">
            <div class="content first-content">
                <!-- <div class="first-column">
                    <h2 class="title title-primary">Bem vindo de Volta</h2>
                    <p class="description description-primary">Para se manter conectado com a gente</p>
                    <p class="description description-primary">por favor faça o login com suas informações.</p>
                    <button id="signin" class="btn btn-primary">Logar</button>
                </div>
                <div class="second-column">
                    <h2 class="title title-second">Trabalhe Conosco</h2>
                    <form method="post" action="banco_de_dados/request_sql.php" class="form">
                        <label class="label-input" for="nome-empresa">
                            <i class="far fa-address-card icon-modify"></i>
                            <input type="text" placeholder="Nome da empresa" name="nome-empresa" id="nome-empresa" required>
                        </label>

                        <label class="label-input" for="email-contato">
                            <i class="far fa-envelope icon-modify"></i>
                            <input type="email" placeholder="Email para contato" name="email-contato" id="email-contato" required>
                        </label>
                        <label class="label-input" for="telefone-contato">
                            <i class="fas fa-phone icon-modify"></i>
                            <input type="text" placeholder="Telefone para contato" name="telefone-contato" id="telefone-contato" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" required>
                        </label>

                        <span class="checkbox">
                            <input type="checkbox" name="Termos" id="Termos" required> <label for="Termos">Li e Aceito os <a href="termos.php">Termos de uso</a> </label>
                        </span>

                        <button class="btn btn-second" type="submit">Registrar Solicitação</button>
                    </form>
                </div>second column -->
            </div><!-- first content -->
            <div class="content second-content">
                <div class="first-column">
                    <h2 class="title title-primary">Bem-vindo! </h2>
                    <p class="description description-primary">Não tem uma conta?</p>
                    <p class="description description-primary"><a style="color:white" href="cadastro">REGISTRE-SE</a>
                    </p>
                </div>

                <div class="second-column">
                    <?php
                    if (isset($_SESSION['erro']) && $_SESSION['erro'] === 'erro') : ?>
                    <div class="notification alert-danger">
                        <p>ERRO: Telefone inválido.</p>
                    </div>
                    <?php endif; ?>
                    <h2 class="title title-second">Login</h2>
                    <p>&nbsp;</p>
                    <form action="BancoDeDados/logar.php" method="post" class="form">
                        <label for="tel">
                            <h1 style="text-align: center;color: #58af9b;margin-bottom: 4px;">Telefone</h1>
                        </label>
                        <label class="label-input" for="telefonelogin">
                            <i class="fas fa-phone icon-modify"></i>
                            <input attrname="telephone1" id="telefone" type="text" name="telefone" placeholder="Numero do seu telefone" required>
                        </label>

                        <button class="btn btn-second" type="submit">Logar</button>



                    </form>
                </div><!-- second column -->

            </div><!-- second-content -->
        </div>


</body>

</html>
<script>
function inputHandler(masks, max, event) {
	var c = event.target;
	var v = c.value.replace(/\D/g, '');
	var m = c.value.length > max ? 1 : 0;
	VMasker(c).unMask();
	VMasker(c).maskPattern(masks[m]);
	c.value = VMasker.toPattern(v, masks[m]);
}

var telMask = ['+99 (99) 99999-9999', '+99 (99) 99999-9999'];
var tel = document.querySelector('input[attrname=telephone1]');
VMasker(tel).maskPattern(telMask[0]);
tel.addEventListener('input', inputHandler.bind(undefined, telMask, 14), false);
</script>