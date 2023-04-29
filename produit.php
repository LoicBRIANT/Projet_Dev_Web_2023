<?php
// Check if the product ID is set in the URL
if(isset($_SERVER['QUERY_STRING'])) {
    $productname = explode("=",$_SERVER['QUERY_STRING'])[1];
    
    // Connect to your database and retrieve the product data based on the ID
    $servername = "localhost";
    $username = "root";
    $password = "";
    
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

    // Préparer la requête d'insertion des données dans la table Compte
    $requete = "SELECT * FROM Type_Produit WHERE nom ='".$productname."' LIMIT 1;";
    // Exécuter la requête
    if ($result = $connexion -> query($requete)) {
        $product =  $result -> fetch_object();
    }

    
    // Close the database connection
    $connexion->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-Descriptif_produitUA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/produit.css">
    <title>Produit</title>
</head>
<body>
  <?php include "header.php"; ?>
  <?php include "side_menu.php"; ?>

  <div class="product">
    <?php if(isset($product)): ?>
        <div class="product-image" style="justify-content: center;">
        <?php
          echo "<img class='image' src='img/".$product->nom.".webp' alt='product image'>";
          ?>
          <div class="product-details" >
            <h1><?php echo $product->nom; ?></h1>
            <p><?php echo $product->Descriptif_produit; ?></p>
            <p><?php echo $product->prix; ?></p>
            <form class="formulaire"action="">
              <label class = "label"for="quantity">Quantité :</label>
              <input class="inpute" type="number" id="quantity" name="quantity" min="1" max="10" value="1">
              <button class = "boutton-panier" type="submit">Ajouter au panier</button>
            </form>
            <?php else: ?>
            <p>No product found with that NAME.</p>
          <?php endif; ?>
          </div>
        </div>       
  </div>
  


  <?php include "footer.php"; ?>
</body>
</html>