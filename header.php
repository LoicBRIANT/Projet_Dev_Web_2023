<head>
  <link rel="stylesheet" href="css/header.css">
</head>
<header>
    <a href="index.php" id="icon_zaun" >
      <img src="img/zaun_crest_icon.png" alt="zaun_icon">
    </a>
    <a href="index.php" id="titre_menu">
        ZAUN
    </a>
    <div class="search-container">
    <form action="index.php">
      <input type="text" placeholder="Search.." name="search"><div id="search"><button type="submit"><img src="img/icons8-search-50.png" class="search_button" alt="search_icon"></button></div>
    </form>
    </div>
    <div id="button_bar">
      <?php
      session_start();
        //On affiche différentes informations si l'utilisateur est connecté ou non
        if(!isset($_SESSION['info_login']) || empty($_SESSION['info_login'])) {
            echo("<a href='login.php' id='bouton'>Connexion</a>");
        } else {
            echo("<a href='compte.php' id='bouton'>Profil : " . $_SESSION['info_login']['pseudo'] . "</a>");
            echo("<a href='deconnexion.php' id='bouton'>Déconnexion</a>");
        }
      ?>
      <a href="Panier.php" id="shop">
        <img src="img/shopping-cart.png" alt="shopping_cart_icon" id="shop_button">
      </a>
    </div>
</header>