<?php
$servername = "localhost";
$username = "exercise1";
$password = "85H@hgdh)/N3nIg4";
$dbname = "exercise1";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$CustomerID = $_POST["CustomerID"];
$CustomerName = $_POST["CustomerName"];
$email = $_POST["email"];
$userPassword = $_POST["password"];
$confirmPassword = $_POST["confirm_password"];
$phone_number = $_POST["phone_number"];

if (strlen($userPassword) < 6) {
    header("Location: editCustomer.php?CustomerID=$CustomerID&error=shortpassword");
    exit();
}

if ($userPassword != $confirmPassword) {
    header("Location: editCustomer.php?CustomerID=$CustomerID&error=password");
    exit();
}

$sql = "UPDATE customers
        SET CustomerName='$CustomerName',
            Email='$email',
            Password='$userPassword',
            PhoneNumber='$phone_number'
        WHERE CustomerID='$CustomerID'";

if (mysqli_query($conn, $sql)) {
    header("Location: http://localhost/class/exercise1/shop.php");
    exit();
} else {
    echo "Error" . mysqli_error($conn);
}

mysqli_close($conn);
?>