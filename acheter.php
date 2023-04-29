<?php
//TODO : AJOUT DELAI LIVRAISON FOURNISSEUR ETC.
session_start();
if (isset($_SESSION['info_login'])){
    var_dump($_SESSION['cart']);
    $userid = (int)$_SESSION['info_login']['ID'];
    $connexion = mysqli_connect('localhost', 'root', '', 'mydb');
    $price = 0;
    foreach ($_SESSION['cart'] as $products) $price += $products['prix'];
    $requetecommande = "INSERT INTO commandes (date_commandes,prix,idCompte)values (NOW(),{$price},{$userid})";
    $connexion ->query($requetecommande);
    $commandeid = $connexion->insert_id;
    $cart = $_SESSION['cart'];
    var_dump($_SESSION['info_login']);
    foreach($cart as $key => $products){
        $requeteproduit= "INSERT INTO Etre_Vendue (quantite,idCompte,idTypeProduit) values ({$products['quantity']},{$_SESSION['info_login']['ID']},{$products['ID']});";
        $requeteproduit .="DELETE FROM etre_dans_panier WHERE (idCompte = {$userid} and idTypeProduit = {$products['ID']});";
        if (mysqli_multi_query($connexion,$requeteproduit)) {
            do {
                // consume all result sets
                if ($result = mysqli_store_result($connexion)) {
                    mysqli_free_result($result);
                }
            } while (mysqli_next_result($connexion));
        }
        else {
            die("Error deleting row: " . mysqli_error($connexion));
        }
        unset($_SESSION['cart'][$key]);
    }

    var_dump($_SESSION['cart']);
    header("Location: Panier.php");
}
else {
    header("Location: login.php");
}
?>