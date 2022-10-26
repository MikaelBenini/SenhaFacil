<?php
require_once 'configSql.php'; 
global $dbh;

    //var_dump($_POST);

    //Define as variáveis pro banco
    $nome = $_POST['nome']; 
    $telefone = $_POST['telefone'];

    $sql = $dbh->prepare('SELECT id, nome, email, setor, telefone FROM users WHERE telefone = :telefone');
    $sql->bindParam(':telefone', $telefone);
    $sql->execute();
    $data = $sql->fetchAll();

    if (empty($data)) {
        
        //Registra no banco os dados 'nome' e 'telefone'
         $sql = "INSERT INTO users (nome, telefone) VALUES (:nome, :telefone)";

         $sql = $dbh->prepare($sql);

        //Recebe os valores da variável no banco
        $sql->execute(array('nome' => $nome, 'telefone' => $telefone));
            
        echo "<script>alert('Registrado com sucesso!'); window.location=\"../login\"; </script>"; //Página que vai ser redirecionado após clicar com Confirmar.
        }else{
            echo "<script>alert('Erro! Numero ja registrado!'); window.location=\"../cadastro\"; </script>";
        
        return true; 
} 
?>