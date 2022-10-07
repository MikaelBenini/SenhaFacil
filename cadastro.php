<!DOCTYPE html>
<html lang="pt-br">


<head>
    <title>Senha Fácil - Cadastro</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="imagem/png" href="/imagens/favicon.ico" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    
    
    
</head>
<body class="corpo">        
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
                    <!-- FORMULÃRIO DE CADASTRO -->
                    <form id="register-form" action="">
                         <!-- BOX Telefone -->
                         <div class="full-box spacing">
                            <label for="lastname">Informe seu numero de telefone</label>
                            <input type="text" name="lastname" id="lastname" placeholder="Digite seu numero de telefone" data-required data-only-letters>
                        </div>
                            <input type="checkbox" name="agreement" id="agreement">
                            <label for="agreement" id="agreement-label">Eu li e aceito os <a href="termos">termos de uso</a></label>
                        </div>
                        <!-- REGISTRAR -->
                        <div class="full-box">
                            <input id="btn-submit" type="submit" value="CONFIRMAR">
                        </div>
                    </form>
                </div>
            </div>  
        </div>
    </div>
    <p class="error-validation template"></p>
</body>
<script src="/js/cadastro.js"></script>
</html>