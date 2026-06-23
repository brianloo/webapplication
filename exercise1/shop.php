<?php
$servername = "localhost";
$username = "exercise1";
$password = "85H@hgdh)/N3nIg4";
$dbname = "exercise1";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="css/shop.css">
    <link rel="stylesheet" href="css/common.css">
</head>
<body>
    <div class="sidebar">
            <a href="">Main Page</a>
            <a href="http://localhost/class/exercise1/shop.php">Customers</a>
            <a href="">Products</a>
            <a href="">Orders</a>
            <a href="http://localhost/class/exercise1/customer.php">Log Out</a>
    </div>
    <div class="content">
        <table width="1100">
            <tr>
                <th>Customer's Name</th>
                <th width="300">Customer ID</th>
                <th width="200">Email</th>
                <th>Phone Number</th>
            </tr>
            <?php

            $query = "SELECT * FROM customers";

            if (!$conn->ping()) {
            die("Connection is closed!");
            }
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
            ?> 
                <tr>
                    <td><?php echo $row['CustomerName']; ?></td>
                    <td><?php echo $row['CustomerID']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    <td><?php echo $row['PhoneNumber']; ?></td>
                    <div class="edit">
                        <td><input type="button" value="Edit"></td>
                    </div>
                    <td><button>Delete</button></td>
                </tr>
                
            <?php
            }
            mysqli_close($conn);
            ?>
            <a href="http://localhost/class/exercise1/addCustomer.php"><input type="submit" value="Add Customer"></a>
        </table>
    </div>
</body>
</html>