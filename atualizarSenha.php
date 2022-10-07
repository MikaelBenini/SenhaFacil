<?php
$title = 'Senha Fácil - Atualizar Senha';
session_start();
ob_start();
 require_once 'header.php';
 require_once 'BancoDeDados/configSql.php';
 require_once 'menu.php';
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/styleesqueceusenha.css">
<link rel="icon" type="imagem/png" href="/imagens/favicon.ico" />


<div class="content">
    <div id="caixalogin">
        <div class="Encontresuaconta">


            <?php
    $chave = filter_input(INPUT_GET, 'chave', FILTER_DEFAULT);


    if (!empty($chave)) {

        $query_email = "SELECT id 
                            FROM users
                            WHERE recuperar_senha =:recuperar_senha  
                            LIMIT 1";
        $result_email = $dbh->prepare($query_email);
        $result_email->bindParam(':recuperar_senha', $chave, PDO::PARAM_STR);
        $result_email->execute();

        if (($result_email) and ($result_email->rowCount() != 0)) {
            $row_email = $result_email->fetch(PDO::FETCH_ASSOC);
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if (!empty($dados['SendNovaSenha'])) {
                $password = $dados['password'];
                $recuperar_senha = 'NULL';
                $query_up_email = "UPDATE users
                        SET password =:password,
                        recuperar_senha =:recuperar_senha
                        WHERE id =:id 
                        LIMIT 1";
                $result_up_email = $dbh->prepare($query_up_email);
                $result_up_email->bindParam(':password', $password, PDO::PARAM_STR);
                $result_up_email->bindParam(':recuperar_senha', $recuperar_senha);
                $result_up_email->bindParam(':id', $row_email['id'], PDO::PARAM_INT);

                if ($result_up_email->execute()) {
                    $_SESSION['msg'] = "<p style='color: green'>Senha atualizada com sucesso!</p>";
                    // header("Location: recuperarSenha.php");
                } else {
                    echo "<p style='color: #ff0000'>Erro: Tente novamente!</p>";
                }
            }
        } else {
            $_SESSION['msg_rec'] = "<p style='color: #ff0000'>Erro: Link inválido, solicite novo link para atualizar a senha!</p>";
            header("Location: recuperarSenha");
        }
    } else {
        $_SESSION['msg_rec'] = "<p style='color: #ff0000'>Erro: Link inválido, solicite novo link para atualizar a senha!</p>";
        header("Location: recuperarSenha");
    }

    ?>
            <?php

    
    if (isset($_SESSION['msg'])) 
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);


    ?>

            <form method="POST" action="" class="formulario">
                <?php
        $email = "";
        if (isset($dados['password'])) {
            $email = $dados['password'];
        } ?>
                <span>Atualizar senha</span>

                <div>
                    <input class="email" input type="password" name="password" placeholder="Digite a nova senha"
                        value="<?php echo $email; ?>" autofocus required>
                </div>
                <div>
                    <a href="login"><input class="submit1" type="button" value="Cancelar"></a>

                    <input class="submit" type="submit" value="Atualizar" name="SendNovaSenha">
                </div>

        </div>
        </form>

    </div>

</div>