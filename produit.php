<?php
// Check if the product ID is set in the URL
if(isset($_GET['id'])) {
    $productId = $_GET['id'];
    
    // Connect to your database and retrieve the product data based on the ID
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "zaun";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare the SQL statement to retrieve the product data
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $productId);
    
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
          <img class="image" src="../img/figurine.jpg" alt="product image">
          <div class="product-details" >
            <h1><?php echo $product['nom']; ?></h1>
            <p><?php echo $product['Descriptif_Produit']; ?></p>
            <p><?php echo $product['Prix']; ?></p>
            <form class="formulaire"action="">
              <label class = "label"for="quantity">Quantité :</label>
              <input class="inpute" type="number" id="quantity" name="quantity" min="1" max="10" value="1">
              <button class = "boutton-panier" type="submit">Ajouter au panier</button>
            </form>
  
          </div>
        </div>
        
        <div class="autre">
          <div class="produit_similaire"><p id="p_is">info suplementaire</p></div>
            <div class="info_supplementaire">
                <ul class="liste_info">
                    <li id="li_ps"> 
                      <img id="image_ps" src="" alt="">
                      <h1 id="titre_ps"> nom </h1>
                      <p id="description_ps"> description </p>
                    </li>
                    <li id="li_ps"> 
                      <img id="image_ps" src="" alt="">
                      <h1 id="titre_ps"> nom </h1>
                      <p id="description_ps"> description </p>
                    </li>
                    <li id="li_ps"> 
                      <img id="image_ps" src="" alt="">
                      <h1 id="titre_ps"> nom </h1>
                      <p id="description_ps"> description </p>
                    </li>
                </ul>
            </div>
            
        </div>

  </div>
  
  <?php else: ?>
    <p>No product found with that ID.</p>
  <?php endif; ?>

  <?php include "footer.php"; ?>
</body>
</html>