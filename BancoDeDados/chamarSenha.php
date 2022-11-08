<?php
include_once 'configSql.php';
require_once '../lib/vendor/twilio/sdk/src/Twilio/autoload.php';
global $dbh;
$sessionid = $_SESSION['id_usuario'];

use Twilio\Rest\Client;


// ------------------------------------------Notificação via SMS------------------------------------------------------
           

$sid = 'AC9305d729b43085182ec95539dd67ae7f';
$token = 'c876dd7ccac7dfd903393c88622c670a';
$client = new Client($sid, $token);

        $sql="SELECT senhas_geradas.id_usuario, senhas.nome_senha, senhas_geradas.sits_senha_id, users.telefone, users.nome, senhas_geradas.fila, senhas_geradas.caixa
        FROM senhas 
        INNER JOIN senhas_geradas
        ON senhas.id = senhas_geradas.senha_id
        INNER JOIN users 
        ON users.id = senhas_geradas.id_usuario
        WHERE senhas_geradas.sits_senha_id = 2";
        $sql = $dbh->prepare($sql);
        $sql->execute();

        while ($row_msg_cont = $sql->fetch(PDO::FETCH_ASSOC)) {  
        if($row_msg_cont['fila'] == 1){ 
            $client->messages->create(
            $row_msg_cont['telefone'],
            [
                'from' => '+12058503202',
                'body' => 'Olá ' .$row_msg_cont['nome']. ' Sua senha é: ' .$row_msg_cont['nome_senha']. ' chegou sua vez, dirija-se ao caixa ' .$row_msg_cont['caixa']. ' em ate 5 minutos.'
            
            ]
        );
    }

        else{   
            $row_msg_cont['fila'] - 1;
            $client->messages->create(
            $row_msg_cont['telefone'],
            [
        'from' => '+12058503202',
        'body' => 'Olá ' .$row_msg_cont['nome']. ' Sua senha é: ' .$row_msg_cont['nome_senha']. ' ainda há ' .$row_msg_cont['fila']. ' pessoas na sua frente.'
            ]             
         );
    }   
}
    
                         
                

                             
 
    
                


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

    $sqlcaixa="SELECT id, caixa
               FROM users
               WHERE id = :sessionid";

    $sqlcaixa = $dbh->prepare($sqlcaixa);

    $sqlcaixa->bindParam(':sessionid', $sessionid, PDO::PARAM_INT);

    $sqlcaixa->execute();

    $row_cont = $sqlcaixa->fetch(PDO::FETCH_ASSOC); 

    $caixa = $row_cont['caixa']; 



if (($result_senha) and ($result_senha->rowCount() != 0)) {


$row_senha = $result_senha->fetch(PDO::FETCH_ASSOC);


extract($row_senha);


$query_senha_gerada = "UPDATE senhas_geradas set  sits_senha_id=3, caixa=$caixa, modified=NOW() WHERE sits_senha_id=2 limit 1 ";

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

// $sql = $dbo->prepare("SELECT fila from senhas_geradas");
// $sql->execute();

// while($row = $sql->fetchAll()){
//    $insert = "INSERT INTO senha_geradas (fila) values (?);
//    $query = $dbt->prepare($insert);
//   $stmt->execute([$email, $senha]);
// }

echo json_encode($retorna);