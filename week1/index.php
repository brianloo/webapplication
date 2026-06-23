<?php
$servername = "localhost";
$username = "brianloo";
$password = "mDN@b_NanvTrDyW1";
$dbname = "brianloo";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

session_start();

// Entering email and password
if (isset($_POST['email']) && isset($_POST['password'])) {

    $query = "SELECT* FROM student WHERE email ='" . $_POST['email'] . "' AND password = '" . $_POST['password'] . "'";
    $result = mysqli_query($conn, $query) or die("Couldn't execute query");

    $num_rows = mysqli_num_rows($result);

    if ($num_rows > 0) {
        $_SESSION['email'] = $_POST['email'];
        header("Location:booklist.php");
    } else {
        echo "Account Not Found";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-size: 20px;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
    </style>
</head>
<body>
    <div id="email">
        <form target="_self" method="POST">
            <h2> Enter your Email: </h2>
            <input type="text" name="email">
            <br />
            <h2> Password: </h2>
            <input type="password" name="password">
            <input type="submit">
        </form>
    </div>
</body>
</html>