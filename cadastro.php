<!DOCTYPE html>
<html lang="pt-br">


<head>
    <title>Senha Fácil - Cadastro</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css?ref=<?php echo time(); ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="imagem/png" href="/imagens/favicon.ico" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-masker/1.1.0/vanilla-masker.min.js"></script>
    
</head>
<body class="corpo">        
    <div class="area-cadastro">
        <div class="content">
            <div class="container">
                <div class="area-cabecalho">
                    <div class="area-logo">
                    <a href="index">    
                        <h1 class="titulo-site">
                            SENHA
                            <span>
                                FÁCIL
                            </span>
                        </h1> 
                    </a>
                    </div>  
                </div>
                <h1 class="texto-cadastro">CADASTRO</h1>
                <div class="painel-cadastro">   
                    <div id="painel-cadastro-dentro">
                    <?php
                        if (isset($_SESSION['erro']) && $_SESSION['erro'] === 'erro') : ?>
                        <div class="notification alert-danger">
                        <p>ERRO: Telefone inválido.</p>
                        </div>
                        <?php endif; ?>
                        <!-- FORMULÃRIO DE CADASTRO -->
                        <form action="BancoDeDados/registro.php" method="post" onsubmit="return verifica()">
                            <!-- BOX SENHA -->  
                            <div class="full-box spacing">
                                <label for="name">Informe seu Nome e Sobrenome</label>
                                <input type="text" name="nome" id="name" placeholder="Digite seu nome" data-required data-min-length="3" data-max-length="16" required>
                            </div>
                            <!-- BOX SOBRENOME 
                            <div class="full-box spacing">
                                <label for="lastname">Informe seu sobrenome</label>
                                <input type="text" name="lastname" id="lastname" placeholder="Digite seu sobrenome" data-required data-only-letters>
                            </div>
                            -->
                             <!-- BOX TELEFONE -->
                             <div class="full-box spacing">
                                <label for="tel">Informe seu numero de telefone</label>
                                <input attrname="telephone1" type="text" name="telefone" id="fone" placeholder="Digite seu numero de telefone" required>
                            </div>
                            <!-- BOX E-MAIL 
                            <div class="full-box spacing">
                                <label for="email">Informe seu E-mail</label>
                                <input type="email" name="email" id="email" placeholder="Digite seu e-mail" data-min-length="2" data-email-validate>
                            </div>
                            -->

                            <!-- BOX SENHA
                            <div class="full-box spacing">
                                <label for="lastname">Informe sua Senha</label>
                                <input type="password" name="password" id="password" placeholder="Digite sua senha" data-password-validate data-required>
                            </div>
                            -->

                            <!-- BOX CONFIRMAÇÃO DE SENHA 
                            <div class="full-box spacing">
                                <label for="passconfirmation">Confirme sua senha</label>
                                <input type="password" name="passconfirmation" id="passwordconfirmation" placeholder="Digite novamente sua senha" data-equal="password">
                            </div>
                            -->
                            <!-- CHECKBOX E TERMOS -->
                            <div>
                                <input type="checkbox" name="agreement" id="agreement">
                                <label for="agreement" id="agreement-label">Eu li e aceito os <a href="termos">termos de uso</a></label>
                            </div>
                            <!-- REGISTRAR -->
                            <div class="full-box">
                                <input type="submit" value="CONFIRMAR">
                            </div>
                        </form>
                    </div>
                </div>  
            </div>
        </div>
    </div>    
    <p class="error-validation template"></p>
</body>
<script src="/js/cadastro.js"></script>
</html>

<script>

function verifica() {
    var telefone = document.querySelector("input[name='telefone']").value;
    if (telefone.length != 19) {
        alert("Telefone inválido");
        return false;
    }
}

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

