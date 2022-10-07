<?php
$url = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>
        <?php
		if (isset($title) && !empty($title)) {
			echo $title;
		} else {
			echo 'Senha Fácil - Inicio';
		}
		?>
    </title>
    <link rel="icon" type="imagem/png" href="/imagens/favicon.ico" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Estilo pagina -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="icon" type="imagem/png" href="/imagens/favicon.ico" />

    <!-- Botao Hamburguer -->
    <link rel="stylesheet" type="text/css" href="css/menu.css">

    <link rel="stylesheet" type="text/css" href="./css/cabecalho.css">

    <!-- Tela recuperar senha -->
    <?php if ($url == '/recuperarSenha') : ?>
    <link rel="stylesheet" type="text/css" href="css/styleesqueceusenha.css">
    <link rel="icon" type="imagem/png" href="/imagens/favicon.ico" />
    <?php endif; ?>

    <!-- Termos de privacidade -->
    <?php if ($url == '/termos') : ?>
    <link rel="stylesheet" type="text/css" href="css/termos.css">
    <link rel="icon" type="imagem/png" href="/imagens/favicon.ico" />
    <?php endif; ?>

    <?php if ($url == '/termoscon') : ?>
    <link rel="stylesheet" type="text/css" href="css/termos.css">
    <link rel="icon" type="imagem/png" href="/imagens/favicon.ico" />
    <?php endif; ?>

    <!-- Area logado Menu -->
    <?php if ($url == '/adminmenu') : ?>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="icon" type="imagem/png" href="/imagens/favicon.ico" />
    <?php endif; ?>

    <!-- Area logado Caixas -->
    <?php if ($url == '/adminSenha') : ?>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="icon" type="imagem/png" href="/imagens/favicon.ico" />
    <?php endif; ?>


    <!-- Area logado Planos -->
    <?php if ($url == '/planos') : ?>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="icon" type="imagem/png" href="/imagens/favicon.ico" />
    <?php endif; ?>

    <!-- Area logado -->
    <?php if ($url == '/adminuser') : ?>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/user.css">
    <link rel="icon" type="imagem/png" href="/imagens/favicon.ico" />
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <?php endif; ?>

    <!-- Area Admin -->
    <?php if ($url == '/adminpagamentos') : ?>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="icon" type="imagem/png" href="/imagens/favicon.ico" />
    <?php endif; ?>

    <?php if ($url == '/adminlistauser') : ?>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="icon" type="imagem/png" href="/imagens/favicon.ico" />
    <?php endif; ?>

    <?php if ($url == '/historicouser') : ?>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="icon" type="imagem/png" href="/imagens/favicon.ico" />
    <?php endif; ?>

    <?php if ($url == '/historicoatendente') : ?>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <link rel="icon" type="imagem/png" href="/imagens/favicon.ico" />
    <?php endif; ?>

</head>

<body class="inicio">

    <div class="content">