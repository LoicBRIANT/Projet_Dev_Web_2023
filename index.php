<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername,$username,$password);

if($conn->connect_error){
    die("Connection failed: " .$conn->connect_error);
}
//echo "Connected successfully";

$sql = "CREATE DATABASE mydb";
if($conn->query($sql) === TRUE){
    //echo "Database created successfully";
}else{
    //echo "Error creating database: ". $conn->error;
}

$conn = null;
?>


<!DOCTYPE html>
<html>

<head lang="fr">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
</head>

<body>
    <?php include "header.php"; ?>
    <?php include "side_menu.php"; ?>
    <?php include "Accueil.php"; ?>
    <?php include "footer.php"; ?>
</body>
</html>
