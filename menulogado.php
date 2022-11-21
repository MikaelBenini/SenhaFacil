<?php
global $dbh;
require_once 'header.php';
require_once 'BancoDeDados/configSql.php';
$sessionid = $_SESSION['id_usuario'];
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<?php 
        $sql="SELECT id, caixa
        FROM users
        WHERE id = :sessionid";
        $sql = $dbh->prepare($sql);
        $sql->bindParam(':sessionid', $sessionid, PDO::PARAM_INT);
        $sql->execute();
        $row_msg_cont = $sql->fetch(PDO::FETCH_ASSOC); 
    ?>

<div class="container">
    <div class="area-cabecalho">
        <div id="area-logo">
            <h4 class="verde">SENHA <span class="branco">FÁCIL</span> </h4>

        </div>

        <div class="showdesktop">

            <?php if ($url == '/admin') : ?>
            <nav id="area-menu">
                <a class="plano" href="adminpagamentos">Pagamentos</a>
                <a class="plano" href="adminlistauser">Lista de usuarios</a>
            </nav>

            <?php elseif ($url == '/pagamentos') : ?>
            <nav id="area-menu">
                <a class="plano" href="panel">Menu</a>
            </nav>

            <?php elseif ($url == '/users') : ?>
            <nav id="area-menu">
                <a class="plano" href="panel">Menu</a>
            </nav>

            <?php elseif ($url == '/caixas') : ?>
            <nav id="area-menu">
                <a class="plano" href="panel">Menu</a>
            </nav>

            <?php elseif ($url == '/historicouser') : ?>
            <nav id="area-menu">
                <a class="plano" href="home">Menu</a>
            </nav>

            <?php elseif ($url == '/adminmenu') : ?>
            <nav id="area-menu">
                <form method="post">
                    <input type="submit" name="button" class="button" value="Liberar senhas" />


                    <a class="plano" href="planos">Planos</a>
                    <a class="plano" href="chamar">Caixa</a>
                </form>
            </nav>
            <?php elseif ($url == '/home') : ?>

            <nav id="area-menu">
                <a href="historicouser">Historico de senhas</a>
            </nav>

            <?php elseif ($url == '/planos') : ?>

            <nav id="area-menu">
                <a href="adminmenu">Menu</a>
                <a class="plano" href="chamar">Caixa</a>
            </nav>

            <?php elseif ($url == '/chamar') : ?>
            <nav id="area-menu">
                <h3 class="guiche">Guichê <?php echo $row_msg_cont['caixa'] ?> </h3>
                <a href="historicoatendente">Historico de senhas</a>
                <a href="adminmenu">Menu</a>
            </nav>

            <?php elseif ($url == '/historicoatendente') : ?>
            <nav id="area-menu">
                <a href="adminmenu">Menu</a>
                <a href="chamar">Caixa</a>
            </nav>
            <?php endif; ?>

            <a class="buttonlogin2" href="BancoDeDados/logout.php">Sair</a>
        </div>

        <div class="showmobile">
            <input id="menu-hamburguer" class="inputmenu" type="checkbox" />

            <label for="menu-hamburguer">
                <div class="menu">
                    <span class="hamburguer"></span>
                </div>
            </label>-->
            <ul class="showmobile">
                <a class="plano" href="BancoDeDados/logout.php">Sair</a>
            </ul>
        </div>
    </div>
</div>

<?php
if(array_key_exists('button', $_POST)) {
    global $dbh;
    $sql="UPDATE senhas_geradas set sits_senha_id=4 WHERE sits_senha_id!=4";
    $sql = $dbh->prepare($sql);
    $sql->execute();

    $sql1="UPDATE senhas SET sits_senha_id=1 WHERE sits_senha_id!=4";
    $sql1 = $dbh->prepare($sql1);
    $sql1->execute();
  
        }
?>