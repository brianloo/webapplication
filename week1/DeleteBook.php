<?php
$servername = "localhost";
$username = "brianloo";
$password = "mDN@b_NanvTrDyW1";
$dbname = "brianloo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['ISBN'])) {
    $isbn = $_POST['ISBN'];

    $sql = "DELETE FROM booklist WHERE ISBN=$isbn";

    if ($conn->query($sql) === TRUE) {
        header("Location: booklist.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}
?>