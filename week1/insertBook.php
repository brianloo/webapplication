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

if (empty($ISBN) || empty($title) || empty($author) || empty($description) || empty($price)) {
    header("Location: addBook.php?error=Please fill out all fields");
    exit();
}
else if (!preg_match('/^\d+(\.\d{1,2})?$/', $ISBN) || strlen($ISBN) != 13) {
    header("Location: addBook.php?error=Please fill out the ISBN field with a valid 13-digit number");
    exit();
}
else if (!preg_match('/^\d+(\.\d{1,2})?$/', $price)) {
    header("Location: addBook.php?error=Please fill out the price field with a valid number");
    exit();
}

$sql = "INSERT INTO booklist (ISBN, title, author, description, price) 
VALUES ('$ISBN', '$title', '$author', '$description', $price)";

if (mysqli_query($conn, $sql)) {
    header("Location:booklist.php");
}

$conn->close();
?>