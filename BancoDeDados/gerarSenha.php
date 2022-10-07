<?php
include_once 'configSql.php';
global $dbh;
$sessionid = $_SESSION['id_usuario'];

$tipo = filter_input(INPUT_GET, 'tipo', FILTER_SANITIZE_NUMBER_INT);



$sql="SELECT id_usuario, sits_senha_id
             FROM senhas_geradas
             WHERE senhas_geradas.id_usuario = :sessionid
             AND senhas_geradas.sits_senha_id = 2";
        $sql = $dbh->prepare($sql);
        $sql->bindParam(':sessionid', $sessionid, PDO::PARAM_INT);
        $sql->execute();

        $data = $sql->fetchAll();

if(empty($data)){

    if (!empty($tipo)) {

    
        $query_senha = "SELECT id, nome_senha 
                        FROM senhas
                        WHERE sits_senha_id=:sits_senha_id 
                        AND tipos_senha_id=:tipos_senha_id
                        ORDER BY id ASC 
                        LIMIT 1";


        $result_senha = $dbh->prepare($query_senha);


        $result_senha->bindValue(':sits_senha_id', 1, PDO::PARAM_INT);
        $result_senha->bindParam(':tipos_senha_id', $tipo, PDO::PARAM_INT);
        // $result_senha->bindParam(':sessionid', $sessionid, PDO::PARAM_INT);
        

        $result_senha->execute();


        if (($result_senha) and ($result_senha->rowCount() != 0)) {


            $row_senha = $result_senha->fetch(PDO::FETCH_ASSOC);

    
            extract($row_senha);

            
    
            $query_senha_gerada = "INSERT INTO senhas_geradas (senha_id, sits_senha_id, id_usuario, created) VALUES ($id, 2, $sessionid, NOW())";

            $cad_senha_gerada = $dbh->prepare($query_senha_gerada);


            $cad_senha_gerada->execute();

            $sql="SELECT count(sits_senha_id) as total
            FROM senhas_geradas
            WHERE senhas_geradas.sits_senha_id = 2";
            $sql = $dbh->prepare($sql);
            $sql->execute();
            $count = $sql->fetchColumn();

            $sql = "UPDATE senhas_geradas SET fila=$count
            WHERE fila = 0 LIMIT 1";
            $sql = $dbh->prepare($sql);
            $sql->execute();

        
           

            if ($cad_senha_gerada->rowCount()) {

        
                $query_edit_senha = "UPDATE senhas SET sits_senha_id=2 WHERE id=$id LIMIT 1";

            
                $edit_senha = $dbh->prepare($query_edit_senha);


                $edit_senha->execute();


                $retorna = ['status' => true, 'nome_senha' => "<span style='color: #43ED9C;'>$nome_senha</span>"];
            } else {

                $retorna = ['status' => false, 'msg' => "<span  style='color: #f00;'>Erro: Senha não gerada!</span>"];
            }
        } else {

            $retorna = ['status' => false, 'msg' => "<span>Senhas esgotadas!</span>"];
        }
    } else {

        $retorna = ['status' => false, 'msg' => "<span style='color: #f00;'>Erro: Senha não gerada!</span>"];
    }

}
else {

    $retorna = ['status' => false, 'msg' => "<span style='color: #f00;'>Voce já possui uma Senha!</span>"];
}

echo json_encode($retorna);


