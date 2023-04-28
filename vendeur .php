<!DOCTYPE html>
<html>
    <head>
        <br>
        <title>Page_vendeur</title>
        <link rel="stylesheet" type="text/css" href="css/style_vendeur.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/side_menu.css">
        <link rel="stylesheet" href="css/footer.css">
        <br>
        <br>
    </head>  

    <body>
        <?php include 'header.php'; ?>
        <?php include 'side_menu.php'; ?>
        <div class="carre"></div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <p class="para_particulier"> Informations de l'utilisateur </p>
        <br>
        <br>
        <br>
        <br>
        <br>
        <p class="para_particulier">-identifiant/adresse mail/téléphone</p>
        <br>
        <br>
        <p class="para_particulier">-nom de l'entrerpise ou statut particulier</p>

        <div class="input-container-form">
            <div class=pani>
                <button type="button" class="style_butt">
                    <a href=Panier.html>Panier</a>
                </button>
            </div>
        </div>

         <div class="input-container-form">
            <div class="s_abon">
            <button type="submit" class="style_butt">S'abonner</button>
            </div>
         </div>
         <div class="input-container-form">
            <div class="comm">
                <button type="button" class="style_butt">
                    <a href=Commandes.html>Commande</a>
                </button>
            </div>
         </div>
         <div class="input-container-form">
            <div class="vente">
                <button type="button" class="style_butt">
                    <a href=menu.html>Menu de vente</a>
                </button>
            </div>
         </div>

         <div class="input-container-form">
            <div class="complet">
            <button type="text" class="Completer_des_informations">Compléter des informations</button>
            </div>
         </div>
         <?php include("footer.php"); ?>
    </body>
</html>
