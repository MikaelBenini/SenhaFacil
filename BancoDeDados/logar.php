<?php
   
    $_SESSION['erro'] = '';  
    if (isset($_POST['telefone']) && !empty($_POST['telefone'])) {

        require_once 'configSql.php';
        require_once 'Usuario.class.php';

        $usuario = new Usuario();

        $telefone = addslashes($_POST['telefone']);

        if($usuario->login($telefone) == true){
                 $_SESSION['nomedousuario'] = 1;
                
        switch($_SESSION['setor']){
            case 0:
                header("location: ../adminmenu");
                break;

                case 1:
                    header("location: ../home");
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
