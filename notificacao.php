<?php

global $dbh;
include_once 'BancoDeDados/configSql.php';

// require __DIR__ . '/lib/vendor/autoload.php';

require __DIR__ . '/lib/vendor/twilio/sdk/src/Twilio/autoload.php';


use Twilio\Rest\Client;
 

$sid = 'AC3396f554960c115b03fe1ecd2b1ace54';
$token = 'c4e7a715e947019f3f69732e0942e321';
$client = new Client($sid, $token);

        $sql="SELECT senhas_geradas.id_usuario, senhas.nome_senha, senhas_geradas.sits_senha_id, users.telefone, users.nome, senhas_geradas.fila
        FROM senhas 
        INNER JOIN senhas_geradas
        ON senhas.id = senhas_geradas.senha_id
        INNER JOIN users 
        ON users.id = senhas_geradas.id_usuario
        WHERE senhas_geradas.sits_senha_id = 2";
        $sql = $dbh->prepare($sql);
        $sql->execute();
        while ($row_msg_cont = $sql->fetch(PDO::FETCH_ASSOC)) {
    
$client->messages->create(
    $row_msg_cont['telefone'],
    [
        'from' => '+19859806173',
        'body' => 'Olá ' .$row_msg_cont['nome']. ' Sua senha é: ' .$row_msg_cont['nome_senha']. ' ainda há ' .$row_msg_cont['fila']. ' pessoas na sua frente.'
    ]
);
                 } ?>

                 