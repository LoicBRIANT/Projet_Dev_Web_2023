<head>        
    <meta charset="utf-8" />        
    <meta name="viewport" content="width=device-width"/>         
    <title>Login
    </title> 
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>   
<div id="login">
    <div class="rectangle">
        
    <form id="form">


    // Créer une connexion
    $conn = mysqli_connect($servername, $username, $password_db, $dbname);

    // Vérifier si la connexion a réussi
    if (!$conn) {
        die("La connexion à la base de données a échoué: " . mysqli_connect_error());
    }

    // Échapper les caractères spéciaux pour éviter les injections SQL
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Requête SQL pour récupérer l'utilisateur correspondant à l'email et au mot de passe saisis
    $sql = "SELECT * FROM utilisateurs WHERE email='$email' AND mot_de_passe='$password'";

    // Exécuter la requête SQL
    $result = mysqli_query($conn, $sql);

    // Vérifier si l'utilisateur existe
    if (mysqli_num_rows($result) == 1) {
        // L'utilisateur est connecté avec succès, rediriger vers la page d'accueil
        $_SESSION['ID'] = $user['id'];
        $_SESSION['connecter'] = true;
        header("Location: index.php");
        exit();
    } else {
        // L'utilisateur n'existe pas ou les informations de connexion sont incorrectes, afficher un message d'erreur
        $error_message = "Email ou mot de passe incorrect.";
    }

    // Fermer la connexion à la base de données
    mysqli_close($conn);
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

    
