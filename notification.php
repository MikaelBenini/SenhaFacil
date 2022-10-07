<?php

global $dbh;

include_once 'BancoDeDados/configSql.php';

$access_token = "APP_USR-3606995753215615-061509-d56cdb3739f635f92051ba3e08818a02-1143232977";

  if(isset($_REQUEST['data_id']) || isset($_REQUEST['payment_id'])){
    $payment_id = $_REQUEST['data_id'] ? $_REQUEST['data_id'] : $_REQUEST['payment_id'];

    $curl = curl_init();

    curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.mercadopago.com/v1/payments/'.$payment_id,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer '.$access_token
    ),
));


  $payment_info = json_decode(curl_exec($curl), true);
  curl_close($curl);
  
}

$status = $payment_info['status'];
$collector_id = $payment_info['collector_id'];
$payment_id = $_REQUEST['data_id'];
$date_approved = $payment_info['date_approved'];
$date_created = $payment_info['date_created'];
$date_last_updated = $payment_info['date_last_updated'];
$date_of_expiration = $payment_info['date_of_expiration'];
$description = $payment_info['description'];
$payment_method_id = $payment_info['payment_method_id'];
$status_detail = $payment_info['status_detail'];
$transaction_amount = $payment_info['transaction_amount'];

if(isset($_REQUEST['data_id'])){
$sqlconsulta = $dbh->prepare("SELECT *  FROM pedido WHERE payment_id = :payment_id");
$sqlconsulta->bindParam(':payment_id', $_REQUEST['data_id']);

$sqlconsulta->execute();
$data = $sqlconsulta->fetchAll();



if (empty($data)) {
    $sql = $dbh->prepare("INSERT INTO pedido (collector_id, status, id_cliente, date_approved, date_created, date_last_updated, date_of_expiration, description, payment_id, payment_method_id, status_detail, transaction_amount)
    VALUES (:collector_id, :status, :session_id, :date_created, :date_approved, :date_last_updated, :date_of_expiration, :description, :payment_id, :payment_method_id, :status_detail, :transaction_amount )");

    $sql->bindParam(':collector_id', $collector_id);
    $sql->bindParam(':status', $status);
    $sql->bindParam(':session_id', $payment_info['external_reference']);
    $sql->bindParam(':date_approved', $date_approved);
    $sql->bindParam(':date_created', $date_created);
    $sql->bindParam(':date_last_updated', $date_last_updated);
    $sql->bindParam(':date_of_expiration', $date_of_expiration);
    $sql->bindParam(':description', $description);
    $sql->bindParam(':payment_id', $_REQUEST['data_id']);
    $sql->bindParam(':payment_method_id', $payment_method_id);
    $sql->bindParam(':status_detail', $status_detail);
    $sql->bindParam(':transaction_amount', $transaction_amount);
    $sql->execute();


} else {
    $sql = $dbh->prepare("UPDATE pedido 
    SET collector_id=:collector_id, status=:status, id_cliente=:session_id, date_approved=:date_approved, date_created=:date_created, date_last_updated=:date_last_updated, date_of_expiration=:date_of_expiration, description=:description, payment_id=:payment_id, payment_method_id=:payment_method_id, status_detail=:status_detail, transaction_amount=:transaction_amount WHERE payment_id = :payment_id");
    
    $sql->bindParam(':collector_id', $collector_id);
    $sql->bindParam(':status', $status);
    $sql->bindParam(':session_id', $payment_info['external_reference']);
    $sql->bindParam(':date_approved', $date_approved);
    $sql->bindParam(':date_created', $date_created);
    $sql->bindParam(':date_last_updated', $date_last_updated);
    $sql->bindParam(':date_of_expiration', $date_of_expiration);
    $sql->bindParam(':description', $description);
    $sql->bindParam(':payment_id', $_REQUEST['data_id']);
    $sql->bindParam(':payment_method_id', $payment_method_id);
    $sql->bindParam(':status_detail', $status_detail);
    $sql->bindParam(':transaction_amount', $transaction_amount);
    $sql->execute();
    
}


}
   $semplano = '0';  
   $planoum = '1';
   $planodois = '2';
   $planotres = '3';

        if($description == 'Plano Um' && $status == 'approved'){
            $sql = $dbh->prepare("UPDATE users SET plano = :planoum
            WHERE
            id = :session_id");

            $sql->bindParam(':planoum', $planoum);
            $sql->bindParam(':session_id', $payment_info['external_reference']);
            $sql->execute();

        }
        else if($description == 'Plano Dois' && $status == 'approved'){
            $sql = $dbh->prepare("UPDATE users SET plano = :planodois
            WHERE
            id = :session_id");

            $sql->bindParam(':planodois', $planodois);
            $sql->bindParam(':session_id', $payment_info['external_reference']);
            $sql->execute();

        }

        else if($description == 'Plano Tres' && $status == 'approved'){
            $sql = $dbh->prepare("UPDATE users SET plano = :planotres
            WHERE
            id = :session_id");

            $sql->bindParam(':planotres', $planotres);
            $sql->bindParam(':session_id', $payment_info['external_reference']);
            $sql->execute();

        }

        else{
            $sql = $dbh->prepare("UPDATE users SET plano = :semplano
            WHERE
            id = :session_id");

            $sql->bindParam(':semplano', $semplano);
            $sql->bindParam(':session_id', $payment_info['external_reference']);
            $sql->execute();

        }

 ?>

