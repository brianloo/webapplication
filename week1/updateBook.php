<?php
$servername = "localhost";
$username = "brianloo";
$password = "mDN@b_NanvTrDyW1";
$dbname = "brianloo";
session_start();

$conn = mysqli_connect($servername, $username, $password, $dbname);

$ISBN = $_POST["ISBN"];
$title = $_POST["title"];
$author = $_POST["author"];
$description = $_POST["description"];
$price = $_POST["price"];

$sql = "UPDATE booklist
        SET title='$title',
            author='$author',
            description='$description',
            price='$price'
        WHERE ISBN='$ISBN'";

if (mysqli_query($conn, $sql)) {
    header("Location: http://localhost/class/week1/booklist.php");
    exit();
} else {
    echo "Error" . mysqli_error($conn);
}

mysqli_close($conn);
?>