<?php
// Check if the product ID is set in the URL
if(isset($_SERVER[''])) {
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
    $stmt = $conn->prepare("SELECT * FROM Etre_Dans_Panier WHERE idCompte = ?");
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
    <link rel="stylesheet" href="css/panier.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/side_menu.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Menu Vente</title>
</head>
<script>
    //function to get an element by id?

</script>

<body>
    <?php include "header.php"; ?>
    <?php include "side_menu.php"; ?>
  
<div class="menu_vente">
  <ul class="listepr">
    <li class="listeprli">
      <img src="https://via.placeholder.com/150" alt="Product Image">
      <h3>Product Name 3</h3>
      <p>Description of product 3.</p>
      <span class="price">$100.00</span>
      <button class="boutton"> retirer du panier</button>
    </li>
    <li class="listeprli">
      <img src="https://via.placeholder.com/150" alt="Product Image">
      <h3>Product Name 3</h3>
      <p>Description of product 3.</p>
      <span class="price">$100.00</span>
      
      <button class="boutton"> retirer du panier</button>
    </li>
    <li class="listeprli">
      <img src="https://via.placeholder.com/150" alt="Product Image">
      <h3>Product Name 3</h3>
      <p>Description of product 3.</p>
      <span class="price">$100.00</span>
      
      <button class="boutton"> retirer du panier</button>
    </li>
    <li class="listeprli">
      <img src="https://via.placeholder.com/150" alt="Product Image">
      <h3>Product Name 3</h3>
      <p>Description of product 3.</p>
      <span class="price">$100.00</span>
      
      <button class="boutton"> retirer du panier</button>
    </li>
  </ul>
  <div class="menu_gauche">
    <button class="boutton"> retour</button>
  </div>
</div>
  
  
  



<?php include "footer.php"; ?>
</body>
</html>