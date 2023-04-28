<!DOCTYPE html>
<html>  
    <head>        
        <meta charset="utf-8" />        
        <meta name="viewport" content="width=device-width"/>         
        <title>Login
        </title> 
        <link rel="stylesheet" type="text/css" href="css/login.css">
    </head>  
    <body>
        <?php include 'header.php'; ?>
        <?php include 'side_menu.php'; ?>

        <div class="rectangle">
            <form id="form">
                <div class="title">Login</div>
                <br>
                <br>
                <input id="Mot de passe" class="input" type="text" placeholder=" " />
                <div class="cut"></div>
        </div>

        <br><br>
            <div class="input-container-form">
                <div class="connec">
                <button type="text" class="Seconnecter">Se connecter</button>
                </div>
            </div>
            <br>
                <div class="input-container-form">
                <div class="compte">
                <button type="text" class="Créer compte">Créer compte</button>
                </div>
            </div>
            <div class="input-container-form">  
                <div class ="retour">
                <button type="text" class="Retour vers l'accueil">Retour vers l'accueil</button>
                </div>
            </div>
    </form>
    </div>

</div>

<?php include "footer.php"; ?>
    
