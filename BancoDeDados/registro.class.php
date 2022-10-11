<?php

class Usuario{  

    public function login($nome, $telefone){
    global $dbh;

    $sql = $dbh->prepare('SELECT id, nome, email, setor, telefone FROM users WHERE nome = :nome AND telefone = :telefone');
    $sql->bindParam(':nome', $nome);
    $sql->bindParam(':telefone', $telefone);
    $sql->execute();

    if ($sql->rowCount() == 1) {
        $array = $sql->fetch();
        session_start();

        $_SESSION['nome'] = $array['nome'];
        $_SESSION['setor'] = $array['setor'];
        $_SESSION['id_usuario'] = $array['id'];

        
        return true;
    } else {
        return false;
    }

    }
}
