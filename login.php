
<?php
// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];


    // Connexion à la base de données
    $connexion = mysqli_connect('localhost', 'root', '');

    // Vérifier si la connexion a réussi
    if (!$connexion) {
        die('Erreur de connexion au compte : ' . mysqli_connect_error());
    }else{
        //echo "connexion au compte";
    }

    if (!(mysqli_query($connexion,"USE myDB;"))) {
        die('Erreur de connexion à la base de données : ' . mysqli_connect_error());
    }else{
        //echo "connexion a la bdd";
    }


    // Échapper les caractères spéciaux dans les données du formulaire pour éviter les injections SQL
    $email = mysqli_real_escape_string($connexion, $email);
    $mot_de_passe = mysqli_real_escape_string($connexion, $mot_de_passe);


    // Préparer la requête d'insertion des données dans la table Compte
    $requete = "SELECT * FROM Compte WHERE (email = '".$email."' )and( motdePasse = '".$mot_de_passe."') LIMIT 1;";
    $result = $connexion -> query($requete);
    // Exécuter la requête
    if (mysqli_num_rows($result) == 1) {

        $var = $result ->fetch_object();
        $_SESSION['cart']= [];
        $_SESSION['info_login'] = [];//met les variables des serveurs dans les sessions
        $_SESSION['info_login']['prenom'] = $var->prenom;
        $_SESSION['info_login']['nom'] = $var->nom;
        $_SESSION['info_login']['pseudo'] = $var->pseudo;
        $_SESSION['info_login']['addresse_livraison'] = $var->addresse_livraison;
        $_SESSION['info_login']['email'] = $var->email;
        $_SESSION['info_login']['date_creation'] = $var->date_creation;
        $_SESSION['info_login']['adresse'] = $var->adresse;
        $_SESSION['info_login']['telephone'] = $var->telephone;
        $_SESSION['info_login']['nom_role'] = $var->nom_role;
        $_SESSION['info_login']['ID'] = $var->ID;
        header("Location: index.php");
        exit;
    } else {
        $error_name= 'Erreur lors de la connexion au compte: ' . mysqli_error($connexion);
    }
    // Fermer la connexion
    mysqli_close($connexion);


    // Redirection vers la page de connexion

}
?>

<!DOCTYPE html>
<html>  
    <head>        
        <meta charset="utf-8" />        
        <meta name="viewport" content="width=device-width"/>         
        <title>Login</title> 
        <link rel="stylesheet" type="text/css" href="css/login.css">
    </head>
    <body>
        <?php include 'header.php'; ?>

        <?php include 'side_menu.php'; ?>
        <div id="login">
        <div class="rectangle">
            <?php if (isset($error_name)) : ?>
                <p style="color: red;"><?php echo $error_name; ?></p>
            <?php endif; ?>
            <form id="form" method="POST" action="login.php">
        
        
                <div class="title">Login</div>
                <br>
                <div class="input-container ic1">
                    <label for="Adresse e-mail" class="placeholder">Adresse e-mail : </label>
                    <br>
                    <br>
                    <input id="Adresse e-mail" name ="email" class="input" type="text" placeholder=" " />
                    <div class="cut"></div>
                </div>
                <br>
                <div class="input-container ic1">
                        <label for="Mot de passe" class="placeholder">Mot de passe :</label>
                        <br>
                        <br>
                        <input id="Mot de passe" name ="mot_de_passe" class="input" type="text" placeholder=" " />
                        <div class="cut"></div>
                </div>
        
                <br><br>
                    <div class="input-container-form">
                        <div class="connec">
                            <input type="submit" class="bouton" name ="submit" value ="Se connecter">
                        </div>
                    </div>
                    <br>
                    <div class="input-container-form">
                        <div class="compt">
                            <button type="button" class="bouton">
                                <a href=creer_compte.php>Aller vers page création de compte</a>
                            </button>
                        </div>
                    </div>
                    <div class="input-container-form">  
                        <div class ="retour">
                            <button type="button" class="bouton">
                                <a href=index.php>Retour vers l'accueil</a>
                            </button>
                        </div>
                    </div>
            </form>
        </div>
        </div>
        <?php include('footer.php'); ?>
    </body>
</html>
