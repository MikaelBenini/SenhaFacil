<?php 
global $dbh;
require_once 'BancoDeDados/configSql.php';
require_once 'header.php'; 
$title = 'Senha Fácil - Chamar Senha';
if (!isset($_SESSION['nomedousuario'])) {
    header('Location: login.php');
}
$sessionid = $_SESSION['id_usuario'];
?>
<?php require_once 'menulogado.php'; ?>
<!-- inicio conteudo da pagina -->

<h1 class=senhachamada>Historico de Senhas</h1>

<div class="pagamentos">
    <div class="containeradm">
        <table class="tabelapagamentos">
            <thead>
                <th>⠀⠀⠀⠀Numero da Senha⠀⠀⠀⠀</th>
                <th>⠀⠀⠀⠀Data Atendida⠀⠀⠀⠀</th>
            </thead>
            <tbody>

                <?php 
        $sql="SELECT senhas.nome_senha, senhas_geradas.modified, senhas_geradas.id_usuario, senhas_geradas.sits_senha_id
              FROM senhas 
              INNER JOIN senhas_geradas
               ON senhas.id = senhas_geradas.senha_id
               WHERE senhas_geradas.caixa = :sessionid";
        $sql = $dbh->prepare($sql);
        $sql->bindParam(':sessionid', $sessionid, PDO::PARAM_INT);
        $sql->execute();
        while ($row_msg_cont = $sql->fetch(PDO::FETCH_ASSOC)) {
    ?>
                <tr>
                    <td><?php echo $row_msg_cont['nome_senha']; ?> </td>
                    <td><?php echo $row_msg_cont['modified']; ?> </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<div class="pagamentos">