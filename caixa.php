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
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="https://unpkg.com/jwt-decode/build/jwt-decode.js"> </script>
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
                </div>

                <div class="second-column">
                    <?php
                    if (isset($_SESSION['erro']) && $_SESSION['erro'] === 'erro') : ?>
                    <div class="notification alert-danger">
                        <p>ERRO: Usuário ou senha inválidos.</p>
                    </div>
                    <?php endif; ?>
                    <h2 class="title title-second">Login</h2>
                    <p>&nbsp;</p>
                    <form action="BancoDeDados/logarSql.php" method="post" class="form">
                        <label class="label-input" for="emailempresalogin">
                            <i class="far fa-envelope icon-modify"></i>
                            <input type="email" placeholder="Email" name="email" id="email" required>
                        </label>

                        <label class="label-input" for="senha">
                            <i class="fas fa-lock icon-modify"></i>
                            <input type="password" placeholder="Senha" name="senha" id="senha" required>
                        </label>


                        <a class="password" href="recuperarSenha">Esqueceu sua Senha?</a>

                        <button class="btn btn-second" type="submit">Logar</button>

                        <p>&nbsp;</p>
                        <p>&nbsp;</p>

                        <!-- <script>
                        function handleCredentialResponse(response) {
                            const data = jwt_decode(response.credential)
                            console.log(data)
                        }
                        window.onload = function() {
                            google.accounts.id.initialize({
                                client_id: "903318381192-vs5h6939pefbv99s2vgtjb3g8ecf10rl.apps.googleusercontent.com",
                                callback: handleCredentialResponse,

                            });
                            google.accounts.id.renderButton(
                                document.getElementById("buttonDiv"), {
                                    theme: "filled_black",
                                    size: "medium",
                                    type: "standard",
                                    shape: "pill",
                                    text: "$ {button.text}",
                                    logo_alignment: "left"
                                }
                            );

                        }
                        </script>
                        <div id="buttonDiv"></div> -->

                    </form>
                </div><!-- second column -->

            </div><!-- second-content -->
        </div>



</body>

</html>