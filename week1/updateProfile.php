<?php
$servername = "localhost";
$username = "brianloo";
$password = "mDN@b_NanvTrDyW1";
$dbname = "brianloo";
session_start();

$conn = mysqli_connect($servername, $username, $password, $dbname);

$oldemail = $_SESSION["email"];
$name = $_POST["name"];
$password = $_POST["password"];
$yearjoin = $_POST["yearjoin"];

// Update user info
$sql = "UPDATE student 
        SET name='$name', 
            password='$password', 
            yearjoin='$yearjoin'
        WHERE email='$oldemail'";

if (mysqli_query($conn, $sql)) {
    // Update session email if changed
    header("Location: http://localhost/class/week1/profile.php");
    exit();
} else {
    echo "Error" . mysqli_error($conn);
}

mysqli_close($conn);
?>