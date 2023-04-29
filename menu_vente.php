<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/menu_vente.css">
    <title>Menu Vente</title>
</head>

<body>
    <?php include "header.php"; ?>
    <?php include "side_menu.php"; ?>
<div class="menu_vente">
<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        
        $conn = new mysqli($servername,$username,$password);
        
        if($conn->connect_error){
            die("Connection failed: <br>" .$conn->connect_error);
        }
        //echo "Connected successfully to account <br>";
        
        $sql = "USE myDB";
        if($conn->query($sql) === TRUE){
            //echo "connected successfully to database <br>";
        }else{
            echo "Error connecting to database: ". $conn->error;
        }
        
        $result = $conn->query("SELECT * FROM Etre_Vendue WHERE idCompte = ".$_SESSION['info_login']['ID'].";");
        
        foreach ($result as $value) {
            $requete = "SELECT * FROM Type_Produit WHERE ID = ".$value["idTypeProduit"]." LIMIT 1;";

            // Exécuter la requête
            if ($resultat = $conn -> query($requete)) {
                $var =  $resultat -> fetch_object();
            }
            echo '<img src="img/'.$var->nom.'.webp" alt="'.$var->nom.'"><h3>'.$var->nom.'</h3><p>'.$var->Descriptif_produit.'</p><span class="price">'.$var->prix.'</span>
            <label>Quantité en stock:</label>
            <input type="number" name="quantity" min="0" value="'.$value["quantite"].'">';
            }
        $conn = null;
    ?>
      

  <div id="button_bar_vente">
      <a href="Ajouter_produit.php">ajouter un produit</a>
      <a>Vos contrats</a>
      <a> Faire nouveau contrat</a>
  </div>
  </div>
    <?php include "footer.php"; ?>

</body>
</html>