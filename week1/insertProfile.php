<?php
$servername = "localhost";
$username = "brianloo";
$password = "mDN@b_NanvTrDyW1";
$dbname = "brianloo";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$password = $_POST['Password'];
$confirmPassword = $_POST['ConfirmPassword'];
$name = $_POST['Name'];
$yearJoined = $_POST['YearJoined'];

$sql = "INSERT INTO profiles (Password, ConfirmPassword, Name, YearJoined) 
VALUES ('$password', '$confirmPassword', '$name', $yearJoined)";

if (mysqli_query($conn, $sql)) {
    header("Location:profile.php");
}

$conn->close();
?>