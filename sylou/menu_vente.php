<?php
session_start();
// Connect to your database and retrieve the product data
if ($_SESSION['connecter'] == true ){
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare the SQL statement to retrieve the product data
$stmt = $conn->prepare("SELECT * FROM Produits Where id_2 = ?");
$stmt->bind_param("i", $_SESSION['ID']);
$stmt->execute();

// Retrieve the product data
$result = $stmt->get_result();

// Close the database connection
$stmt->close();
$conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/side_menu.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="menu_vente.css">
    <title>Menu Vente</title>
</head>

<body>
  <header>
    <img id="icon_zaun" src="../img/zaun_crest_icon.png" alt="zaun_icon">
    <div id="titre_menu">
        ZAUN
    </div>
    <div class="search-container">
    <form action="index.php">
      <input type="text" placeholder="Search.." name="search"><div id="search"><button type="submit"><img src="../img/icons8-search-50.png" class="search_button" alt="search_icon"></button></div>
    </form>
    </div>
    <div id="compte">
      <p>Compte</p>
    </div>
    <div id="shop">
      <img src="../img/shopping-cart.png" alt="shopping_cart_icon" id="shop_button">
    </div>
</header>
  <div id="side_menu">
    <div id="champinion" class="categorie">
        <button type="submit">champignon</button>
    </div>
    <div id="Figurine" class="categorie">
        <button type="submit">Figurine</button>
    </div>
    <div id="Jeux" class="categorie">
        <button type="submit">Jeux</button>
    </div>
    <div id="shimmer" class="categorie">
        <button type="submit">shimmer</button>
    </div>
</div>
<div class="menu_vente">
  <ul class="listepr">
  <?php while($product = $result->fetch_assoc()): ?>
    <li class="listeprli">
    <h3><?php echo $product['nom']; ?></h3> 
    <p><?php echo $product['Descriptif_Produit']?></p>
    <span class="price"><?php echo $product['prix']?></span>
    <form action="retirer_vente.php?id=<?php echo $product['ID']; ?>" method="post">
        <button> retirer de la vente</button>
      </form>
  </li>
  <?php endwhile; ?>
 
  </ul>
  <body>
    <button>
      <p>ajouter un produit</p>
    </button>
    <button>
      <p>Vos contrats</p>
    </button>
    <button>
      <p> Faire nouveau contrat</p>
    </button>
  </body>
</div>
  
  
  


<footer>
    <div id="div_1">
        <a href="Info.php">
        Info et contact
        </a>
    </div>
    <div id="div_2">
        <a href="Confidentialite.php">
        Confidentialité
        </a>
    </div>
    <div id="div_3">
        <a href="Condition.php">
        Conditions générales de vente
        </a>
    </div>
    <div id="div_4">
        <a href="Propos.php">
        A propos
        </a>
    </div>
</footer>
</body>
</html>