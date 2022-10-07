<?php 
$title = 'Senha Fácil - Planos';
require_once 'header.php'; 
require_once 'menulogado.php'; 
require_once 'BancoDeDados/configSql.php';
global $dbh;?>

<?php
if (!isset($_SESSION['nomedousuario'])) {
    header('Location: login');
}

$access_token = 'APP_USR-3606995753215615-061509-d56cdb3739f635f92051ba3e08818a02-1143232977';

 require_once 'lib/vendor/autoload.php';
MercadoPago\SDK::setAccessToken($access_token);

?>


<!-- Objeto 1 -->

<?php
// Cria um objeto de preferência
$preference = new MercadoPago\Preference();

// Cria um item na preferência
$item = new MercadoPago\Item();
$item->title = 'Plano Um';
$item->quantity = 1;
$item->unit_price = 75.00;
$preference->items = array($item);
$preference->save();

$preference->back_urls = array(
    "success" => 'https://senhafacil.net.br/planos',
    "failure" => 'https://senhafacil.net.br/planos',
    "pending" => 'https://senhafacil.net.br/planos',
);

$preference->notification_url = 'https://senhafacil.net.br/notification.php';
$preference->external_reference = $_SESSION['id_usuario'];
$preference->save();

$link = $preference->init_point;

?>

<?php
// Cria um objeto de preferência
$preference = new MercadoPago\Preference();

// Cria um item na preferência
$item = new MercadoPago\Item();
$item->title = 'Plano Dois';
$item->quantity = 1;
$item->unit_price = 50.00;
$preference->items = array($item);
$preference->save();

$preference->back_urls = array(
    "success" => 'https://senhafacil.net.br/planos',
    "failure" => 'https://senhafacil.net.br/planos',
    "pending" => 'https://senhafacil.net.br/planos',
);

$preference->notification_url = 'https://senhafacil.net.br/notification.php';
$preference->external_reference = $_SESSION['id_usuario'];
$preference->save();

$link1 = $preference->init_point;

?>

<?php
// Cria um objeto de preferência
$preference = new MercadoPago\Preference();

// Cria um item na preferência
$item = new MercadoPago\Item();
$item->title = 'Plano Tres';
$item->quantity = 1;
$item->unit_price = 20.00;
$preference->items = array($item);
$preference->save();

$preference->back_urls = array(
    "success" => 'https://senhafacil.net.br/planos',
    "failure" => 'https://senhafacil.net.br/planos',
    "pending" => 'https://senhafacil.net.br/planos',
);

$preference->notification_url = 'https://senhafacil.net.br/notification.php';
$preference->external_reference = $_SESSION['id_usuario'];
$preference->save();

$link2 = $preference->init_point;

?>

<!-- Objeto 1 -->

<style>
html {
    overflow: hidden;
}
</style>


<div id="textomaior">
    <h4 class="branco">
        Nossos Planos
    </h4>
    <div id="textomenor">
        <h4 class="branco">
            <br>
            Retire Seu limite de Senhas, Confira nossos planos!
        </h4>
    </div>
</div>
<div class="row">
    <div class="item1">
        <h1>Empresa $75</h1>

        <br>

        <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book.</h3>
        <br>

        <span><a id="pagamento" href=<?php echo $link?>>Adquerir</a></span>

        <br>



    </div>
    <div class="item1">
        <h1> Micro $50</h1>

        <br>


        <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book.</h3>

        <br>


        <span><a id="pagamento" href=<?php echo $link1?>>Adquerir</a></span>

    </div>
    <div class="item1">
        <h1> Basico $20</h1>

        <br>


        <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book.</h3>

        <br>


        <span><a id="pagamento" href=<?php echo $link2?>>Adquerir</a></span>

    </div>
</div>

</div>
<?php require_once 'footer.php'; ?>

<script src="https://sdk.mercadopago.com/js/v2"></script>