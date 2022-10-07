<?php   
        include_once 'configSql.php';
        global $dbh;
        $sql="UPDATE senhas_geradas set sits_senha_id=4 WHERE sits_senha_id=3";
        $sql = $dbh->prepare($sql);
        $sql->execute();

        $sql1="UPDATE senhas SET sits_senha_id=1";
        $sql1 = $dbh->prepare($sql1);
        $sql1->execute();
      
        $retorna = ['status' => true, 'nome_senha' => "<span style='color: #43ED9C;'>sucesso</span>"];


        json_encode($retorna);
?>