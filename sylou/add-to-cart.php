<?php
session_start(); // Start the session

// Check if the product ID is set in the URL and the form was submitted
if(isset($_GET['id']) && isset($_POST['quantity'])) {
    $productId = $_GET['id'];
    $quantity = $_POST['quantity'];
    
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
    
    // Check if the product exists and add it to the cart
    if($product) {
        // Check if the cart is already set in the session
        if(!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        
        // Add the product to the cart
        $product['quantity'] = $quantity;
        array_push($_SESSION['cart'], $product);
        
        // Redirect to the cart page
        header('Location: cart.php');
        exit();
    }
}

// If the product ID is not set or the product does not exist, redirect back to the previous page
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>