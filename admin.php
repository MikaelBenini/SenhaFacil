<?php 
global $dbh;
require_once 'BancoDeDados/configSql.php';
require_once 'header.php'; 
$title = 'Senha Fácil - Chamar Senha';
if (!isset($_SESSION['nomedousuario'])) {
    header('Location: login');
}
?>
<?php require_once 'menulogado.php'; ?>
<!-- inicio conteudo da pagina -->

<h1 class=senhachamada>Menu</h1>

<div class="pagamentos">
    <div class="containeradm">
        
    </div>
</div>
</div>
<div class="pagamentos">