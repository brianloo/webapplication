<?php
$servername = "localhost";
$username = "exercise1";
$password = "85H@hgdh)/N3nIg4";
$dbname = "exercise1";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$ProductID = $_POST["ProductID"];
$ProductName = $_POST["ProductName"];
$Description = $_POST["Description"];
$Price = $_POST["Price"];

$sql = "INSERT INTO products (ProductID, ProductName, Description, Price) 
VALUES ('$ProductID', '$ProductName', '$Description', '$Price')";

if (mysqli_query($conn, $sql)) {
    header("Location: product.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}

$conn->close();
?>