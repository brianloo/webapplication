<?php
$servername = "localhost";
$username = "brianloo";
$password = "mDN@b_NanvTrDyW1";
$dbname = "brianloo";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$ISBN = $_POST['ISBN'];
$title = $_POST['title'];
$author = $_POST['author'];
$description = $_POST['description'];
$price = $_POST['price'];

$sql = "INSERT INTO booklist (ISBN, title, author, description, price) 
VALUES ('$ISBN', '$title', '$author', '$description', $price)";

if (mysqli_query($conn, $sql)) {
    header("Location:booklist.php");
}

$conn->close();
?>