<?php
include_once 'configSql.php';
require_once '../lib/vendor/twilio/sdk/src/Twilio/autoload.php';
global $dbh;
$sessionid = $_SESSION['id_usuario'];
use Twilio\Rest\Client;

    // ------------------------------------------Notificação via SMS------------------------------------------------------

    
    $sqlcaixa="SELECT caixa
               FROM users
               WHERE id = :sessionid";

    $sqlcaixa = $dbh->prepare($sqlcaixa);

    $sqlcaixa->bindParam(':sessionid', $sessionid, PDO::PARAM_INT);

    $sqlcaixa->execute();

    $row_cont = $sqlcaixa->fetch(PDO::FETCH_ASSOC); 

    $caixa = $row_cont['caixa']; 

    $query_define_caixa = "UPDATE senhas_geradas set caixa=$caixa WHERE sits_senha_id=2 limit 1";

    $query_define_caixa = $dbh->prepare($query_define_caixa);

    $query_define_caixa ->execute();


    $i=0;

    $sid = 'AC3c40d99dd88574878966be7897de2797';
    $token = '01df55a0b1672bd58ce9f6f40e4a328e';
    $client = new Client($sid, $token);
    
            $sqlsms="SELECT senhas_geradas.id_usuario, senhas.nome_senha, senhas_geradas.sits_senha_id, users.telefone, users.nome, senhas_geradas.fila, senhas_geradas.caixa
            FROM senhas 
            INNER JOIN senhas_geradas
            ON senhas.id = senhas_geradas.senha_id
            INNER JOIN users 
            ON users.id = senhas_geradas.id_usuario
            WHERE senhas_geradas.sits_senha_id = 2";
            $sqlsms = $dbh->prepare($sqlsms);
            $sqlsms->execute();
            while ($row_msg_cont = $sqlsms->fetch(PDO::FETCH_ASSOC)) {  
            $twilliodestino = '+55 ' .$row_msg_cont['telefone'];
            if($row_msg_cont['fila'] == 1){ 
                $client->messages->create(
                $twilliodestino,
                [
                    'from' => '+14258427617',
                    'body' => 'Olá ' .$row_msg_cont['nome']. ' Sua senha é: ' .$row_msg_cont['nome_senha']. ' chegou sua vez, dirija-se ao caixa ' .$row_msg_cont['caixa']. ' em ate 5 minutos.'
                
                ]
            );
        }
    
            else{   
                $i++;
                $client->messages->create(
                $row_msg_cont['telefone'],
                [
            'from' => '+14258427617',
            'body' => 'Olá ' .$row_msg_cont['nome']. ' Sua senha é: ' .$row_msg_cont['nome_senha']. ' ainda há ' .$i. ' pessoas na sua frente.'
                ]             
            );
            
        }   
    }
    
                        
                    
            $insert1 = "UPDATE senhas_geradas SET fila=1 where fila=2";
            $insert1 = $dbh->prepare($insert1);
            $insert1->execute();
            $insert2 = "UPDATE senhas_geradas SET fila=2 where fila=3";
            $insert2 = $dbh->prepare($insert2);
            $insert2->execute(); 
            $insert3 = "UPDATE senhas_geradas SET fila=3 where fila=4";
            $insert3 = $dbh->prepare($insert3);
            $insert3->execute();
            $insert4 = "UPDATE senhas_geradas SET fila=4 where fila=5";
            $insert4 = $dbh->prepare($insert4);
            $insert4->execute();
            $insert5 = "UPDATE senhas_geradas SET fila=5 where fila=6";
            $insert5 = $dbh->prepare($insert5);
            $insert5->execute();
            $insert6 = "UPDATE senhas_geradas SET fila=6 where fila=7";
            $insert6 = $dbh->prepare($insert6);
            $insert6->execute();
 
    
                

// ------------------------------------------Notificação via SMS------------------------------------------------------


$tipo = filter_input(INPUT_GET, 'tipo', FILTER_SANITIZE_NUMBER_INT);


if (!empty($tipo)) {

  
    $query_senha = "SELECT id, nome_senha
                    FROM senhas
                    WHERE sits_senha_id=:sits_senha_id 
                    ORDER BY id ASC 
                    LIMIT 1";


    $result_senha = $dbh->prepare($query_senha);

    $result_senha->bindValue(':sits_senha_id', 2, PDO::PARAM_INT);

    $result_senha->execute();

//-------------------------------------------//


if (($result_senha) and ($result_senha->rowCount() != 0)) {


$row_senha = $result_senha->fetch(PDO::FETCH_ASSOC);


extract($row_senha);


$query_senha_gerada = "UPDATE senhas_geradas set  sits_senha_id=3, modified=NOW() WHERE sits_senha_id=2 limit 1 ";

$cad_senha_gerada = $dbh->prepare($query_senha_gerada);


$cad_senha_gerada->execute();

if ($cad_senha_gerada->rowCount()) {


$query_edit_senha = "UPDATE senhas SET sits_senha_id=3 WHERE id=$id LIMIT 1";


$edit_senha = $dbh->prepare($query_edit_senha);


$edit_senha->execute();


$retorna = ['status' => true, 'nome_senha' => "<span style='color: #43ED9C;'>$nome_senha</span>"];
} else {

$retorna = ['status' => false, 'msg' => "<span style='color: #f00;'>Não há senhas para chamar!</span>"];
}
} else {

$retorna = ['status' => false, 'msg' => "<span>Não há senhas para chamar!</span>"];
}
} else {

$retorna = ['status' => false, 'msg' => "<span style='color: #f00;'>Erro: Senha não chamada!</span>"];
}


echo json_encode($retorna);