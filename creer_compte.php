<?php

<<<<<<< Updated upstream
session_start(); // démarrer la session

=======
>>>>>>> Stashed changes
// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {

    // Récupérer les données du formulaire
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $identifiant = $_POST['identifiant'];
    $mot_de_passe = $_POST['mot_de_passe'];

/* Stocker les données dans la session
    $_SESSION['prenom'] = $prenom;
    $_SESSION['nom'] = $nom;
    $_SESSION['email'] = $email;
    $_SESSION['identifiant'] = $identifiant;
    $_SESSION['mot_de_passe'] = $mot_de_passe;*/

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
    $prenom = mysqli_real_escape_string($connexion, $prenom);
    $nom = mysqli_real_escape_string($connexion, $nom);
    $email = mysqli_real_escape_string($connexion, $email);
    $identifiant = mysqli_real_escape_string($connexion, $identifiant);
    $mot_de_passe = mysqli_real_escape_string($connexion, $mot_de_passe);



    // Préparer la requête d'insertion des données dans la table Compte
    $requete = "INSERT INTO Compte (prenom_client, Nom_client, email, pseudo, Motdepasse) VALUES ('$prenom', '$nom', '$email', '$identifiant', '$mot_de_passe')";

    // Exécuter la requête
    if (mysqli_query($connexion, $requete)) {
        echo '<div>Le compte a été créé avec succès.</div>';
    } else {
        echo '<div>Erreur lors de la création du compte : ' . mysqli_error($connexion)."</div>";
    }

    // Fermer la connexion
    mysqli_close($connexion);


    // Redirection vers la page de connexion
    header("Location: login.php");
    exit; // Assure que le script s'arrête après la redirection
}

?>

<!DOCTYPE html>
<html>
    <head>
        <br>
        <title>Creation_compte</title>
        <link rel="stylesheet" type="text/css" href="css/creation_compte.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/side_menu.css">
        <link rel="stylesheet" href="css/footer.css">
        <br>
        <br>
    </head>  

    <body>

        <?php include('header.php'); ?>
        <?php include('side_menu.php'); ?>

        <div class="rectangle">
            <form id="form" method="POST" action="creer_compte.php">
                <div class="title">Création d'un compte</div>
                <br>
                <div class="input-container ic1">
                    <label for="Entrer votre prénom" class="placeholder">Prénom : </label>
                    <br>
                    <input id="prenom" class="input" type="text" name="prenom" placeholder="Entrer votre prénom " />
                    <div class="cut"></div>
                </div>
                <br>
                <div class="input-container ic1">
                    <label for="Entrer votre nom" class="placeholder">Nom : </label>
                    <br>
                    <input id="nom" class="input" type="text" name="nom" placeholder="Entrer votre nom" />
                    <div class="cut"></div>
                </div>
                <br>
                <div class="input-container ic1">
                    <label for="Entrer une Adresse e-mail" class="placeholder">Adresse e-mail : </label>
                    <br>
                    <input id="Adresse e-mail" class="input" type="text" name="email" placeholder="Entrer votre adresse e-mail " />
                    <div class="cut"></div>
                </div>
                <br>
                <div class="input-container ic1">
                    <label for="Entrer un identifiant" class="placeholder">Identifiant : </label>
                    <br>
                    <input id="Adresse e-mail" class="input" type="text" name="identifiant" placeholder="Entrer votre identifiant " />
                    <div class="cut"></div>
                </div>
                <br>
                <div class="input-container ic1">
                        <label for="Entrer votre Mot de passe" class="placeholder">Entrer votre mot de passe :</label>
                        <br>
                        <input id="Mot de passe" class="input" type="text" name="mot_de_passe" placeholder="Entrer votre mot de passe " />
                        <div class="cut"></div>
                </div>
                <br>
                <div class="input-container ic1">
                    <label for="Confirmer votre Mot de passe" class="placeholder">Confirmer votre mot de passe :</label>
                    <br>
                    <input id="Confirmer Mot de passe" class="input" type="text" name="Confirmer votre mot de passe" placeholder="Confirmer votre mot de passe " />
                    <div class="cut"></div>
                </div>
        
                <br><br>
                <br>
                <br>
                <br>
                    <div class="input-container-form">
                        <div class="connec">
                            <input type="submit" class="Création_d'un_compte" name="submit" value="Créer">
                        </div>
                    </div>
                    <br>
                    <div class="input-container-form">
                        <div class="compt">
                            <button type="button" class="Retour vers l'accueil">
                                <a href=index.php>Retour vers l'accueil</a>
                            </button>
                        </div>
                    </div>
                    <div class="input-container-form">  
                        <div class ="retour">
                            <button type="button" class="Retour vers login">
                                <a href=login.php>Retour vers page de Login</a>
                            </button>
                        </div>
                    </div>
            </form>
        </div>
        
        <?php include('footer.php'); ?>
    </body>
</html>

    
<<<<<<< Updated upstream


=======
>>>>>>> Stashed changes
