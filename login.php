<?php

session_start(); // Démarrage de la session

// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Récupérer les valeurs du formulaire
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    /// Stocker les données dans la session
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

    // Requête SQL pour récupérer l'utilisateur correspondant à l'email et au mot de passe saisis
    $requete = "SELECT * FROM Compte WHERE email='$email' AND MotdePasse='$mot_de_passe'";

    // Exécuter la requête
    $resultat = mysqli_query($connexion, $requete);
    if ($resultat) {
    if(mysqli_num_rows($resultat) == 1) {
    echo '<div>Vous êtes connecté.</div>';
    } else {
    echo '<div>Erreur lors de la connexion au compte : mauvais identifiants.</div>';
    }
    } else {
    echo '<div>Erreur lors de la connexion au compte : ' . mysqli_error($connexion)."</div>";
    }

    // Fermer la connexion à la base de données
    mysqli_close($connexion);

    // Redirection vers la page de connexion
    header("Location: index.php");
    exit; // Assure que le script s'arrête après la redirection
}

// Si l'utilisateur est déjà connecté, on le redirige vers la page d'accueil
if(isset($_SESSION['user_id'])) {
    header("Location: accueil.php");
    exit();
}
?>

<!DOCTYPE html>
<html>  
    <head>        
        <meta charset="utf-8" />        
        <meta name="viewport" content="width=device-width"/>         
        <title>Login</title> 
        <link rel="stylesheet" type="text/css" href="css/style_login.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/side_menu.css">
        <link rel="stylesheet" href="css/footer.css">
    </head>
    <body>
        <?php include 'header.php'; ?>
        <?php include 'side_menu.php'; ?>

        <div class="rectangle">
            <form id="form" method="POST" action="login.php">
                <div class="title">Login</div>
                <br>
                <div class="input-container ic1">
                    <label for="email" class="placeholder">Adresse e-mail : </label>
                    <br>
                    <br>
                    <input id="email" class="input" type="text" placeholder=" " />
                    <div class="cut"></div>
                </div>
                <br>
                <div class="input-container ic1">
                    <label for="password" class="placeholder">Mot de passe :</label>
                    <br>
                    <br>
                    <input id="password" class="input" type="password" placeholder=" " />
                    <div class="cut"></div>
                </div>
                <br><br>
                <div class="input-container-form">
                    <div class="connec">
                        <input type="submit" class="Seconnecter" name ="submit" value = "Se connecter" >
                    </div>
                </div>
                <br>
                <div class="input-container-form">
                    <div class="compt">
                        <button type="button" class="Creercompte" onclick="window.location.href='creer_compte.php'">Créer compte</button>
                    </div>
                </div>
                <div class="input-container-form">  
                    <div class ="retour">
                        <button type="button" class="Retourverslaccueil" onclick="window.location.href='index.php'">Retour vers l'accueil</button>
                    </div>
                </div>
            </form>
        </div>

        <?php include 'footer.php'; ?>
</body>
</html>



