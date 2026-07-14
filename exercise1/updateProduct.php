<?php
$servername = "localhost";
$username = "exercise1";
$password = "85H@hgdh)/N3nIg4";
$dbname = "exercise1";

$conn = mysqli_connect($servername, $username, $password, $dbname);


$PID = $_POST["ProductID"];
$ProductName = $_POST["ProductName"];
$Description = $_POST["Description"];
$Price = $_POST["Price"];

if (!preg_match('/^\d+(\.\d{1,2})?$/', $Price)) {
    header("Location: editProduct.php?ProductID=$PID&error=price");
    exit();
}

$sql = "UPDATE products
        SET ProductName='$ProductName',
            Description='$Description',
            Price='$Price'
        WHERE ProductID='$PID'";


if (mysqli_query($conn, $sql)) {
    header("Location: http://localhost/class/exercise1/product.php");
    exit();
} else {
    echo "Error" . mysqli_error($conn);
}


mysqli_close($conn);
?>