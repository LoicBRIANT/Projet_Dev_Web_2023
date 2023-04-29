<?php
session_start();
var_dump($_POST);
echo(isset($_SESSION['info_login']));
echo($_SERVER['QUERY_STRING']);
if (is_numeric($_SERVER['QUERY_STRING'])&&isset($_SESSION['info_login'])){
        $productId = $_SERVER['QUERY_STRING'];
        $quantity = $_POST['quantity'];
        $userid = $_SESSION['info_login']['ID'];
        // Connect to your database and retrieve the product data based on the ID
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "mydb";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            
        }
        // Prepare the SQL statement to retrieve the product data
        $stmt = $conn->prepare("SELECT * FROM type_produit WHERE id = ? LIMIT 1;");
        $productId = (int)$productId;
        $stmt->bind_param("i", $productId);
        // Execute the query
        $stmt->execute();
        
        // Retrieve the product data
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
        
        // Close the database connection
        
        
        $requete = "INSERT INTO mydb.etre_dans_panier (idCompte, idTypeProduit) VALUES ($productId, 1)";
        if($conn->query($requete)) {
            // Check if the cart is already set in the session
            if(!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }
            
            // Add the product to the cart
            $product['quantity'] = $quantity;
            array_push($_SESSION['cart'], $product);
            // Redirect to the cart page
            header('Location: panier.php');
            exit();
        }
        $conn->close();
}
?>