<head>
  <link rel="stylesheet" href="css/Accueil.css">
    <title>Zaun|Magasin spécialisé dans la vente de champignon</title>
</head>
<div id="Accueil">
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "cytech0001";
        
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
        
        $result = $conn->query("SELECT * FROM Type_Produit;");
        foreach ($result as $value) {
            echo '<a href="produit.php?cat='.$value["nom"].'" class="Produit"><img src="img/'.$value["nom"].'.webp" alt="'.$value["nom"].'"><div class="nom_produit">'.$value["nom"].'</div><div class="prix_produit">'.$value["prix"].'€</div></a>';
            }
        $conn = null;
    ?>
</div>