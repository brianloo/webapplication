<?php
$servername = "localhost";
$username = "exercise1";
$password = "85H@hgdh)/N3nIg4";
$dbname = "exercise1";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$CustomerName = $_POST["CustomerName"];
$CustomerID = $_POST["CustomerID"];
$Email = $_POST["Email"];
$PhoneNumber = $_POST["PhoneNumber"];
$Password = $_POST["Password"];
$ConfirmPassword = $_POST["ConfirmPassword"];

// Check if passwords match
if ($Password == $ConfirmPassword) {

    $sql = "INSERT INTO customers (CustomerName, CustomerID, Email, PhoneNumber, Password) 
    VALUES ('$CustomerName', '$CustomerID', '$Email', '$PhoneNumber', '$Password')";

    if (mysqli_query($conn, $sql)) {
        header("Location: shop.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }

} else {
    echo "Passwords do not match!";
}

mysqli_close($conn);
?>