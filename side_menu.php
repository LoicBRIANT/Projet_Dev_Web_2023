<head>
  <link rel="stylesheet" href="css/side_menu.css">
</head>
<div id="side_menu">
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
        
        $result = $conn->query("SELECT * FROM Categorie_de_produit;");

        foreach ($result as $value) {
            echo "<a href='produit.php?cat=".$value["Categorie"]."' class='categorie'>".$value["Categorie"]."</a>";
            }
        $conn = null;
    ?>
</div>