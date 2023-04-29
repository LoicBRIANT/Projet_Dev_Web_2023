<?php

// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {

    // Récupérer les données du formulaire
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $identifiant = $_POST['identifiant'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $role = $_POST['role'];

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

    if (!(mysqli_query($connexion,"USE myDB;"))) {
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
    $requete = "INSERT INTO Compte (prenom,nom,pseudo,addresse_livraison,email,motdePasse ,date_creation,adresse,telephone,nom_role) VALUES ('$prenom','$nom','$identifiant',null,'$email', '$mot_de_passe',null, null,null,'$role');";

    // Exécuter la requête
    if (mysqli_query($connexion, $requete)) {
        echo '<div>Le compte a été créé avec succès.</div>';
    } else {
        echo '<div>Erreur lors de la création du compte : ' . mysqli_error($connexion)."</div>";
    }

    // Fermer la connexion
    mysqli_close($connexion);


    // Redirection vers la page de connexion
    header("Location: deconnexion.php");
    exit; // Assure que le script s'arrête après la redirection
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Creation_compte</title>
        <link rel="stylesheet" type="text/css" href="css/creation_compte.css">
    </head>  

    <body>

        <?php include('header.php'); ?>
        <?php include('side_menu.php'); ?>
        <div class="creer_compte">
            <div class="rectangle">
                <form id="myForm" action="creer_compte.php" method="post">
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
                    <br>
                    <div class="input-container ic1">
                        <label for="role" class="placeholder">Choisissez votre type de compte : </label>
                        <br>
                            <select id="cars" name="role" class="input">
                            <option value="acheteur">Acheteur</option>
                            <option value="vendeur">Vendeur</option>
                            </select> 
                        <div class="cut"></div>
                    </div>
                    <div id="button_bar_compte">
                        <div class="input-container-form">
                            <div class="connec" >
                                <button type="submit">"Créer"</button>
                            </div>
                        </div>
                        <br>
                        <!--<div class="input-container-form">
                            <div class="compt">
                                <button type="button" class="bouton">
                                    <a href=index.php>Retour vers l'accueil</a>
                                </button>
                            </div>
                        </div>-->
                        <div class="input-container-form">  
                            <div class ="retour">
                                <button type="button" class="bouton">
                                    <a href=login.php>Retour vers page de Login</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Ce script js permet d'empêcher le formulaire d'être soumis si les champs sont vides -->
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        document.querySelector("#myForm").addEventListener("submit", function(event) {
                        if (document.querySelector("#prenom").value.trim() === "") {
                            event.preventDefault();
                            alert("Veuillez remplir le champ 'prenom'");
                        }
                        if (document.querySelector("#nom").value.trim() === "") {
                            event.preventDefault();
                            alert("Veuillez remplir le champ 'nom'");
                        }
                        if (document.querySelector("#email").value.trim() === "") {
                            event.preventDefault();
                            alert("Veuillez remplir le champ 'email'");
                        }
                        if (document.querySelector("#identifiant").value.trim() === "") {
                            event.preventDefault();
                            alert("Veuillez remplir le champ 'identifiant'");
                        }
                        if (document.querySelector("#mot_de_passe").value.trim() === "") {
                            event.preventDefault();
                            alert("Veuillez remplir le champ 'mot_de_passe'");
                        }
                        });
                    });
                </script>


            </div>
        </div>
        <?php include('footer.php'); ?>
    </body>
</html>

    
