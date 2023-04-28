
<!DOCTYPE html>
<html>
    <head>
        <title>Page vendeur</title>
        <link rel="stylesheet" href="css/vendeur.css">
    </head> 
    <body> 
        <?php include "header.php"; ?>
        <?php include "side_menu.php"; ?>
        <div id="vendeur">
            <div id="left_vendeur">
                <?php
                    echo " <img src='img/profil_picture/".$_SESSION['info_login']['ID'].".jpg' id='profil_img' alt='Image de profil'>"
                ?>
                <a href="Panier.php" class="input-container-form ic1">
                    Panier
                </a>
                <a href="abonner.php" class="input-container-form ic1">
                    S'abonner
                </a>
                <a href="menu_vente.php" class="input-container-form ic1">
                    Menu de vente
                </a>

                <a href="Commandes.php" class="input-container-form ic1">
                    Commande
                </a>
            </div>
            <div id="right_vendeur">
                <?php
                    echo "<p>Prenom : ".$_SESSION['info_login']['prenom']."</p>";
                    echo "<p>Nom : ".$_SESSION['info_login']['nom']."</p>";
                    echo "<p>Pseudo : ".$_SESSION['info_login']['pseudo']."</p>";
                    echo "<p>Email : ".$_SESSION['info_login']['email']."</p>";
                    echo "<p>Date de création du compte : ".$_SESSION['info_login']['date_creation']."</p>";
                    echo "<p>Addresse : ".$_SESSION['info_login']['adresse']."</p>";
                    echo "<p>Telephone : ".$_SESSION['info_login']['telephone']."</p>";
                    echo "<p>Type du compte : ".$_SESSION['info_login']['nom_role']."</p>";
                    echo "<p>ID : ".$_SESSION['info_login']['ID']."</p>";
                ?>
                <a href="Completer_info.php" class="input-container-form ic1">
                    Compléter des informations
                </a>
            </div>
        </div>
        <?php include "footer.php"; ?>
    </body>
</html>