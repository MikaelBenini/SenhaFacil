<?php 
$title = 'Senha Fácil - Chamar Senha';
require_once 'BancoDeDados/configSql.php';
require_once 'header.php'; 
?>

<?php


if (!isset($_SESSION['nomedousuario'])) {
    header('Location: login');
}
?>
<?php require_once 'menulogado.php'; ?>
<!-- inicio conteudo da pagina -->

<div class="containeradm">
    <div class="senhachamada">

        <div>

            <h6 class="msgalert"> <span id="msgAlerta"></span> </h6>

        </div>

        <button id="chamarsenha" class="botaochamar" type="button" onclick="chamarSenha(1)" >Chamar Senha</button>

        <script src="js/chamarSenha.js"></script>

        <h1 class="historicochamados">Historico de Senhas</h1>
        <table class="tabelasenhas">
            <thead>
                <th>Numero da Senha</th>
                <th>⠀⠀⠀⠀Guichê⠀⠀⠀⠀</th>
            </thead>
            <tbody>

           
                <?php 
        $sql="SELECT senhas.nome_senha, senhas.id, senhas.id_usuario, senhas_geradas.modified, senhas_geradas.created, senhas_geradas.id_usuario, senhas_geradas.caixa
        FROM senhas 
        INNER JOIN senhas_geradas
        on senhas.id = senhas_geradas.senha_id
        WHERE senhas_geradas.sits_senha_id = 3
        ORDER BY senhas.id DESC";
        $sql = $dbh->prepare($sql);
        $sql->execute();
        while ($row_msg_cont = $sql->fetch(PDO::FETCH_ASSOC)) {
    ?>

                <tr>
                    <td><?php echo $row_msg_cont['nome_senha']; ?> </td>
                    <td><?php echo $row_msg_cont['caixa']; ?> </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
$("#chamarsenha").on('click', function(){
    setTimeout(function(){ location.reload(); }, 1000);
});



</script>
