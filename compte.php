<?php
    session_start();
    
    switch ($_SESSION['info_login']['nom_role']) {
        case "acheteur":
            header("Location: acheteur.php");
            break;
        case "vendeur":
            header("Location: vendeur.php");
            break;
        case "root":
            header("Location: admin.php");
            break;
        default:
            header("Location: index.php");
    }
?>