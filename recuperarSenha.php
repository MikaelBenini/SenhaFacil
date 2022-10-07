<?php
$title = 'Senha Fácil - Esqueceu a senha';
require_once 'header.php';
include_once 'BancoDeDados/configSql.php';
require 'lib/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$mail = new PHPMailer(true);
$title = 'Senha Fácil - Esqueceu a senha';

?>
<?php require_once 'menu.php'; ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
    integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<div class="content">
    <div id="caixalogin">
        <div class="Encontresuaconta">

            <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($dados['SendRecupSenha'])) {
        //var_dump($dados);
        $query_email = "SELECT id, nome, email 
                    FROM users
                    WHERE email =:email  
                    LIMIT 1";
        $result_email = $dbh->prepare($query_email);
        $result_email->bindParam(':email', $dados['email'], PDO::PARAM_STR);
        $result_email->execute();

        if (($result_email) and ($result_email->rowCount() != 0)) {
            $row_email = $result_email->fetch(PDO::FETCH_ASSOC);
            $chave_recuperar_senha = password_hash($row_email['id'], PASSWORD_DEFAULT);
            //echo "Chave $chave_recuperar_senha <br>";

            $query_up_email = "UPDATE users
                        SET recuperar_senha =:recuperar_senha 
                        WHERE id =:id 
                        LIMIT 1";
            $result_up_email = $dbh->prepare($query_up_email);
            $result_up_email->bindParam(':recuperar_senha', $chave_recuperar_senha, PDO::PARAM_STR);
            $result_up_email->bindParam(':id', $row_email['id'], PDO::PARAM_INT);

            if ($result_up_email->execute()) {
                $link = "http://senhafacil.net.br/atualizarSenha?chave=$chave_recuperar_senha";

                try {
                    /*$mail->SMTPDebug = SMTP::DEBUG_SERVER;*/
                    $mail->CharSet = 'UTF-8';
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.mailtrap.io';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'cf0fc6f36f212d';
                    $mail->Password   = '5588034e0b4fef';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 2525;

                    $mail->setFrom('atendimento@senhafacil.com', 'Atendimento');
                    $mail->addAddress($row_email['email'], $row_email['nome']);

                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Recuperar senha';
                    $mail->Body    = 'Prezado(a) ' . $row_email['nome'] .".<br><br>Você solicitou alteração de senha.<br><br>Para continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço no seu navegador: <br><br><a href='" . $link . "'>" . $link . "</a><br><br>Se você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.<br><br>";
                    $mail->AltBody = 'Prezado(a) ' . $row_email['nome'] ."\n\nVocê solicitou alteração de senha.\n\nPara continuar o processo de recuperação de sua senha, clique no link abaixo ou cole o endereço no seu navegador: \n\n" . $link . "\n\nSe você não solicitou essa alteração, nenhuma ação é necessária. Sua senha permanecerá a mesma até que você ative este código.\n\n";

                    $mail->send();
                
                   echo "<p style='color: green'>Email de redefinição enviado com sucesso!</p>";
                    
                    
                } catch (Exception $e) {
                    echo "Erro: E-mail não enviado. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                echo  "<p style='color: #ff0000'>Erro: Tente novamente!</p>";
            }
        } else {
            echo "<p style='color: #ff0000'>Erro: Usuário não encontrado!</p>";
        }
    }

    if (isset($_SESSION['msg_rec'])) {
        echo $_SESSION['msg_rec'];
        unset($_SESSION['msg_rec']);
    }

    ?>

            <form method="POST" action="" class="formulario">
                <?php
        $email = "";
        if (isset($dados['email'])) {
            $email = $dados['email'];
        } ?>





                <span>Encontre sua conta</span>


                <div>
                    <input class="email" input type="text" name="email" placeholder="Digite o usuário"
                        value="<?php echo $email; ?>" autofocus required>
                </div>
                <div>
                    <a href="login"><input class="submit1" type="button" value="Cancelar"></a>

                    <input class="submit" type="submit" value="Redefinir" name="SendRecupSenha">
                </div>

        </div>

        </form>

    </div>
</div>