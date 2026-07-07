<?php
session_start();

$servername = "localhost";
$username = "brianloo";
$password = "mDN@b_NanvTrDyW1";
$dbname = "brianloo";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$email = $_POST['email'];
$password = $_POST['password'];

// Check if the email and password exist
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {

    $user = mysqli_fetch_assoc($result);

    // Store login information
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $user['email'];
    $_SESSION['userid'] = $user['id'];   // Optional

    header("Location: booklist.php");
    exit();

} else {
    echo "Invalid email or password.";
}
?>