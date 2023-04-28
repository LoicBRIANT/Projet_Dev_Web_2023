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
    <li class="listeprli">
      <img src="https://via.placeholder.com/150" alt="Product Image">
      <h3>Product Name 3</h3>
      <p>Description of product 3.</p>
      <span class="price">$100.00</span>
      <p>Nombre vendu</p>
      <form action="retirer_vente.php?id=<?php echo $productId; ?>" method="post">
        <button> retirer de la vente</button>
      </form>
      
    </li>
    <li class="listeprli">
      <img src="https://via.placeholder.com/150" alt="Product Image">
      <h3>Product Name 3</h3>
      <p>Description of product 3.</p>
      <span class="price">$100.00</span>
      <p>Nombre vendu</p>
    </li>
    <li class="listeprli">
      <img src="https://via.placeholder.com/150" alt="Product Image">
      <h3>Product Name 3</h3>
      <p>Description of product 3.</p>
      <span class="price">$100.00</span>
      <p>Nombre vendu</p>
    </li>
    <li class="listeprli">
      <img src="https://via.placeholder.com/150" alt="Product Image">
      <h3>Product Name 3</h3>
      <p>Description of product 3.</p>
      <span class="price">$100.00</span>
    </li>
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