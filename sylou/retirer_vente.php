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
    $stmt = $conn->prepare("DELETE FROM your_table_name WHERE id1 = ? AND id2 = ?");
    $stmt->bind_param("i", $productId,$_SESSION['ID']);
    
    // Execute the query
    $stmt->execute();
    
    // Retrieve the product data
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    
    // Close the database connection
    $stmt->close();
    $conn->close();
    // Check if the product exists and add it to the cart


// If the product ID is not set or the product does not exist, redirect back to the previous page
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
}
?>