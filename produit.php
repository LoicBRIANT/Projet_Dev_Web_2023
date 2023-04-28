<?php
// Check if the product ID is set in the URL
if(isset($_SERVER['QUERY_STRING'])) {

    $productname = explode("=",$_SERVER['QUERY_STRING'])[1];
    
    // Connect to your database and retrieve the product data based on the ID
    $servername = "localhost";
    $username = "root";
    $password = "cytech0001";
    $db = "mydb";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password,$db);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare the SQL statement to retrieve the product data
    $stmt = $conn->prepare("SELECT * FROM type_produit WHERE nom = ?");
    $stmt->bind_param("s", $productname);
    
    // Execute the query
    $stmt->execute();
    
    // Retrieve the product data
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    
    // Close the database connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/produit.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/side_menu.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Produit</title>
</head>
<body>
  <?php include "header.php"; ?>
  <?php include "side_menu.php"; ?>

  <div class="product">
    <?php if(isset($product)): ?>
        <div class="product-image" style="justify-content: center;">
          <img class="image" src="img/Elixir_of_Iron.webp" alt="product image">
          <div class="product-details" >
            <h1><?php echo $product['nom']; ?></h1>
            <p><?php echo $product['Descriptif_produit']; ?></p>
            <p><?php echo $product['prix']; ?></p>
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