<!-- HTML form -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/panier.css">
    <link rel="stylesheet" href="css/Ajouter_produit.css">
    <title>Ajouter produit</title>
</head>
<script>
    //function to get an element by id?

</script>

<body>
    <?php include "header.php"; ?>
    <?php include "side_menu.php"; ?>
    <?php
// Connect to MySQL database
$host = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

// Add product to "products" table in database
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $qte = $_POST['qte'];
  $sql = "INSERT INTO Type_Produit (nom,prix,poids,Descriptif_produit,note) VALUES ('$name','$price',null,'$description',null);";

  if (mysqli_query($conn, $sql)) {
    echo "Product added successfully";
  } else {
    echo "Error adding product: " . mysqli_error($conn);
  }

  $requete = "SELECT * FROM Type_Produit WHERE nom = '".$name."' LIMIT 1;";
  
  // Exécuter la requête
  if ($result = $conn -> query($requete)) {
      $var =  $result -> fetch_object();
  }
  $ID_PRODUIT = $var->ID;
  $ID_COMPTE = $_SESSION['info_login']['ID'];

  var_dump($ID_COMPTE);
  var_dump($ID_PRODUIT);

  $sql = "INSERT INTO Etre_Vendue (quantite,idCompte,idTypeProduit) VALUES ('$qte','$ID_COMPTE','$ID_PRODUIT');";
  if (mysqli_query($conn, $sql)) {
    echo "Product added to account";
  } else {
    echo "Error adding product to account: " . mysqli_error($conn);
  }

}

// Close MySQL database connection
mysqli_close($conn);
?>
  <div id="ajout_produit">
      <form method="post">
          <label for="name">Product Name:</label>
          <input type="text" name="name" id="name"><br>
          <label for="description">Description:</label>
          <textarea name="description" id="description"></textarea><br>
          <label for="price">Price:</label>
          <input type="number" name="price" id="price"><br>
          <label for="qte">Quantité:</label>
          <input type="text" name="qte" id="qte"><br>
          <button type="submit" name="submit">Add Product</button>
      </form>
  </div>
  
  
  



<?php include "footer.php"; ?>
</body>
</html>
