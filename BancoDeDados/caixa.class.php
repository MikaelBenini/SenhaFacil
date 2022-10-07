<?php

class Usuario{  

    public function login($email, $senha){
    global $dbh;

    $sql = $dbh->prepare('SELECT id, nome, email, setor FROM users WHERE email = :email AND password = :password');
    $sql->bindParam(':email', $email);
    $sql->bindParam(':password', $senha);
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
