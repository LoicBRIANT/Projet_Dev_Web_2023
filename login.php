<?php

session_start(); // démarrer la session

// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {

    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

// Stocker les données dans la session
    $_SESSION['email'] = $email;
    $_SESSION['mot_de_passe'] = $mot_de_passe;

    // Connexion à la base de données
    $connexion = mysqli_connect('localhost', 'root', 'cytech0001');

    // Vérifier si la connexion a réussi
    if (!$connexion) {
        die('Erreur de connexion au compte : ' . mysqli_connect_error());
    }else{
        echo "connexion au compte";
    }

    if (!(mysqli_query($connexion,"USE siteECommerce;"))) {
        die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
    }else{
        echo "connexion a la bdd";
    }


    // Échapper les caractères spéciaux dans les données du formulaire pour éviter les injections SQL
    $email = mysqli_real_escape_string($connexion, $email);
    $mot_de_passe = mysqli_real_escape_string($connexion, $mot_de_passe);



    // Préparer la requête d'insertion des données dans la table Compte
    $requete = "SELECT * FROM Compte WHERE email = '$email' and motdePasse = '$mot_de_passe'";

    // Exécuter la requête
    if (mysqli_query($connexion, $requete)) {
        echo '<div>Le compte a été créé avec succès.</div>';
    } else {
        echo '<div>Erreur lors de la création du compte : ' . mysqli_error($connexion)."</div>";
    }

    // Fermer la connexion
    mysqli_close($connexion);


    // Redirection vers la page de connexion
    header("Location: .php");
    exit; // Assure que le script s'arrête après la redirection
}
?>


<!DOCTYPE html>
<html>  
    <head>        
        <meta charset="utf-8" />        
        <meta name="viewport" content="width=device-width"/>         
        <title>Login
        </title> 
        <link rel="stylesheet" type="text/css" href="css/style_login.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/side_menu.css">
        <link rel="stylesheet" href="css/footer.css">
    </head>
    <body>
        <?php include 'header.php'; ?>
        <?php include 'side_menu.php'; ?>
        
        <div class="rectangle">
        
            <form id="form">
        
        
                <div class="title">Login</div>
                <br>
                <div class="input-container ic1">
                    <label for="Adresse e-mail" class="placeholder">Adresse e-mail : </label>
                    <br>
                    <br>
                    <input id="Adresse e-mail" class="input" type="text" placeholder=" " />
                    <div class="cut"></div>
                </div>
                <br>
                <div class="input-container ic1">
                        <label for="Mot de passe" class="placeholder">Mot de passe :</label>
                        <br>
                        <br>
                        <input id="Mot de passe" class="input" type="text" placeholder=" " />
                        <div class="cut"></div>
                </div>
        
                <br><br>
                    <div class="input-container-form">
                        <div class="connec">
                            <button type="submit" class="Seconnecter">Se connecter</button>
                        </div>
                    </div>
                    <br>
                    <div class="input-container-form">
                        <div class="compt">
                            <button type="button" class="Créer compte">
                                <a href=creation_compte.html>Aller vers page création de compte</a>
                            </button>
                        </div>
                    </div>
                    <div class="input-container-form">  
                        <div class ="retour">
                            <button type="button" class="Retour vers l'accueil">
                                <a href=Accueil.html>Retour vers l'accueil</a>
                            </button>
                        </div>
                    </div>
            </form>
        </div>
        <footer>
            <div id="div_1">
                <a href="Info.php">
                Info et contact
                </a>
            </div>
            <div id="div_2">
                <a href="Confidentialite.php">
                Confidentialité
                </a>
            </div>
            <div id="div_3">
                <a href="Condition.php">
                Conditions générales de vente
                </a>
            </div>
            <div id="div_4">
                <a href="Propos.php">
                A propos
                </a>
            </div>
        </footer>
    </body>
</html>


    
