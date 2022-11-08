<?php 
global $dbh;
$title = 'Senha Fácil - Senha';
require_once 'BancoDeDados/configSql.php';
require_once 'header.php'; 

if (!isset($_SESSION['nomedousuario'])) {
    header('Location: login.php');
}
?>
<?php require_once 'menulogado.php'; ?>
<!-- inicio conteudo da pagina -->

<h1 class=senhachamada>Lista de Usuarios</h1>

<div class="pagamentos">
    <div class="containeradm">
        <table class="tabelapagamentos">
            <thead>
                <th>⠀⠀⠀⠀ID User⠀⠀⠀⠀</th>
                <th>⠀⠀⠀⠀Telefone⠀⠀⠀⠀</th>
                <th>⠀⠀⠀⠀Nome⠀⠀⠀⠀</th>
            </thead>
            <tbody>

                <?php 
        $sql="SELECT * FROM users where id >=3";
        $sql = $dbh->prepare($sql);
        $sql->execute();
        while ($row_msg_cont = $sql->fetch(PDO::FETCH_ASSOC)) {
    ?>
                <tr>
                    <td><?php echo $row_msg_cont['id']; ?> </td>
                    <td><?php echo $row_msg_cont['telefone']; ?> </td>
                    <td><?php echo $row_msg_cont['nome']; ?> </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<div class="pagamentos">