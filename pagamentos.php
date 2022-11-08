<?php 
global $dbh;
require_once 'BancoDeDados/configSql.php';
require_once 'header.php'; 
$title = 'Senha Fácil - Chamar Senha';
if (!isset($_SESSION['nomedousuario'])) {
    header('Location: login.php');
}
?>
<?php require_once 'menulogado.php'; ?>
<!-- inicio conteudo da pagina -->

<h1 class=senhachamada>Pagamentos </h1>

<div class="pagamentos">
    <div class="containeradm">
        <table class="tabelapagamentos">
            <thead>
                <th>⠀⠀⠀⠀ID Usuario⠀⠀⠀⠀</th>
                <th>⠀⠀⠀⠀Valor⠀⠀⠀⠀</th>
                <th>⠀⠀⠀⠀Metodo de pagamento⠀⠀⠀⠀</th>
                <th>⠀⠀⠀⠀Plano⠀⠀⠀⠀</th>
                <th>⠀⠀⠀⠀Status⠀⠀⠀⠀</th>
            </thead>
            <tbody>

                <?php 
    
        $sql="SELECT * FROM pedido";
        $sql = $dbh->prepare($sql);
        $sql->execute();
        while ($row_msg_cont = $sql->fetch(PDO::FETCH_ASSOC)) {
    ?>
                <tr>
                    <td>Nº <?php echo $row_msg_cont['id_cliente']; ?> </td>
                    <td> <span style="color:green"> R$ <?php echo $row_msg_cont['transaction_amount']; ?> </td>
                    <td><?php echo $row_msg_cont['payment_method_id']; ?> </td>
                    <td> <?php echo $row_msg_cont['description']; ?> </td>
                    <td>
                    <?php
                        if ($row_msg_cont['status'] === 'approved'){
                            echo '<span style="color:green">'.$row_msg_cont['status'];
                        }

                        else if($row_msg_cont['status'] == 'pending'){
                            echo '<span style="color:#ea5353">'.$row_msg_cont['status'];
                        }

                        else {
                            echo '<span style="color:red">'.$row_msg_cont['status'];
                        }
                    
                    ?> 
                    
                </td>
                </tr>
                <?php } ?> 
            </tbody>
        </table>
    </div>
</div>
</div>