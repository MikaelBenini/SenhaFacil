<?php

 switch($_SESSION['setor']){
    case 0:
        header("location: ./adminmenu");
        break;

        case 1:
            header("location: ./home");
            break;

            case 2:
                header("location: ./admin");
                break;

                default:

                header("location: ./login"); 

                break;
            }
?>
