<?php require_once 'BancoDeDados/configSql.php';
require_once 'header.php'; 

$title = 'Senha Fácil - Chamar Senha';
?>
<?php

if (!isset($_SESSION['nomedousuario'])) {
    header('Location: login');
}
$sessionid = $_SESSION['id_usuario'];
?>
<meta http-equiv="refresh" content="20; adminuser">
<?php require_once 'menulogado.php'; ?>
<!-- inicio conteudo da pagina -->
<div class="containeradm">

    <?php
        $sql="SELECT fila
        FROM senhas_geradas
        WHERE senhas_geradas.sits_senha_id = 2";
        $sql = $dbh->prepare($sql);
        $sql->bindParam(':sessionid', $sessionid, PDO::PARAM_INT);
        $sql->execute();    
        $row_msg_cont = $sql->fetch(PDO::FETCH_ASSOC);

        $sqla="SELECT sits_senha_id, caixa
        FROM senhas_geradas
        WHERE id_usuario = :sessionid AND fila = 1";
        $sqla = $dbh->prepare($sqla);
        $sqla->bindParam(':sessionid', $sessionid, PDO::PARAM_INT);
        $sqla->execute();   
        $aviso = $sqla->fetch(PDO::FETCH_ASSOC);

        $sqle="SELECT senhas.nome_senha
        FROM senhas 
       INNER JOIN senhas_geradas
        on senhas.id = senhas_geradas.senha_id
        WHERE senhas_geradas.id_usuario = :sessionid
             AND senhas_geradas.sits_senha_id = 2";
        $sqle = $dbh->prepare($sqle);
        $sqle->bindParam(':sessionid', $sessionid, PDO::PARAM_INT);
        $sqle->execute();

        $data = $sqle->fetch(PDO::FETCH_ASSOC);
        ?>

    <?php if($aviso['sits_senha_id'] == 3){?>
    <h1 class="msgalert">chegou sua vez, dirija-se ao caixa:  <?php echo $aviso['caixa']?>  em ate 5 minutos.</h1>
    <?php }else if (!empty($data)){ ?>

    <h1 class="msgalert"> ainda há <?php echo $row_msg_cont['fila']?> senhas na sua frente.</h1>
    <?php }else{
        
    }?>
    <br><br><br><br>
    <h4 class="msgalert"> <span id="msgAlerta"></span> </h4>
    <div>
        <div class="loader">
        </div>
        <?php
        
    if(!empty($data)){ ?>

        <h1 class="senha" style='color: #43ED9C;'> <?php echo $data['nome_senha']; ?> </h1>

        <?php }else { ?>

        <h1 class="senha"> <span id="senhaGerada"></span> </h1>

        <?php }?>


    </div>


    <button id="gerarsenha" class="botoessenha" type="button" onclick="gerarSenha(1)">Gerar Senha</button>


    <script src="js/custom.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
    $("#gerarsenha").on('click', function() {
        setTimeout(function() {
            location.reload();
        }, 2500);
    });
    </script>

</div>
</div>
</div>