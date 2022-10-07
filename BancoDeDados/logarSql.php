
<?php
   
    $_SESSION['erro'] = '';  
    if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])) {

        require_once 'configSql.php';
        require_once 'caixa.class.php';

        $usuario = new Usuario();

        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        if($usuario->login($email, $senha) == true){
                 $_SESSION['nomedousuario'] = 1;
                
        switch($_SESSION['setor']){
            case 0:
                header("location: ../adminmenu");
                break;

                case 1:
                    header("location: ../adminuser");
                    break;

                    case 2:
                        header("location: ../admin");
                        break;

                        default:

                        header("location: ../login"); 

                        break;
                    }
       
        }else{
            $_SESSION['erro'] = 'erro';
            header("location: ../login");
            
        } 
    } 
?>
