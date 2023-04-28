
<?php
// Connect to MySQL database
$host = "localhost";
$username = "root";
$password = "cytech0001";
$dbname = "myDB";
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

// Add product to "products" table in database
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $sql = "INSERT INTO products (name, description, price) VALUES ('$name', '$description', '$price')";
  if (mysqli_query($conn, $sql)) {
    echo "Product added successfully";
  } else {
    echo "Error adding product: " . mysqli_error($conn);
  }
}

// Close MySQL database connection
mysqli_close($conn);
?>
<!-- HTML form -->

<?php include('header.php'); ?>
<?php include('side_menu.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/panier.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/side_menu.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Menu Vente</title>
</head>
<script>
    //function to get an element by id?

</script>

<body>
    <?php include "header.php"; ?>
    <?php include "side_menu.php"; ?>
  
    <div>
<form method="post">
  <label for="name">Product Name:</label>
  <input type="text" name="name" id="name"><br>
  <label for="description">Description:</label>
  <textarea name="description" id="description"></textarea><br>
  <label for="price">Price:</label>
  <input type="number" name="price" id="price"><br>
  <button type="submit" name="submit">Add Product</button>
</form>
</div>
  
  
  



<?php include "footer.php"; ?>
</body>
</html>

<?php include('footer.php'); ?>