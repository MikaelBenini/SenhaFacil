<?php
require_once 'configSql.php'; 
global $dbh;

    $sql = $dbh->prepare('SELECT id, nome, email, setor, telefone FROM users WHERE nome = :nome AND telefone = :telefone');
    $sql->bindParam(':nome', $nome);
    $sql->bindParam(':telefone', $telefone);
    $sql->execute();

    if ($sql->rowCount() == 0) {
                
         $sql = "INSERT INTO users (nome, telefone) VALUES ($nome, $telefone)";

         $sql = $dbh->prepare($sql);

        $sql->execute();
            
       
        }else{
            header("location: ../cadastro");
        
        return true; 
} 
?>