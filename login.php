<?php?>

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
            <form id="form">
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
                        <button type="submit" class="Seconnecter">Se connecter</button>
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
<?php

// Vérification des identifiants
$servername = "localhost";
$email = "votre_adresse_e-mail";
$password = "votre_mot_de_passe";
$dbname = "Scriptsql_BDD";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupération des identifiants entrés par l'utilisateur
$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];

// Requête pour vérifier si l'utilisateur existe dans la base de données
$sql = "SELECT * FROM compte WHERE email = '$email' AND mot_de_passe = '$mot_de_passe'";
$result = $conn->query($sql);

// Vérification si l'utilisateur existe
if ($result->num_rows == 1) {
    // Redirection vers la page d'accueil
    header('Location: index.php');
    exit();
} else {
    // Redirection vers la page d'erreur 404
    header('Location: erreur404.php');
    exit();
}

// Fermeture de la connexion à la base de données
$conn->close();
?>

?>
</body>
</html>

