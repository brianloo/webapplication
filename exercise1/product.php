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
    <title>Products</title>
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/common.css">
</head>
<body>
    <div class="sidebar">
            <a href="">Main Page</a>
            <a href="http://localhost/class/exercise1/shop.php">Customers</a>
            <a href="http://localhost/class/exercise1/product.php">Products</a>
            <a href="">Orders</a>
            <a href="http://localhost/class/exercise1/customer.php">Log Out</a>
    </div>
    <table width="1100">
        <tr>
            <th>ProductID</th>
            <th>ProductName</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
        <?php

        $query = "SELECT * FROM products";

        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
        ?> 
            <tr>
                <td><?php echo $row['ProductID']; ?></td>
                <td><?php echo $row['ProductName']; ?></td>
                <td><?php echo $row['Description']; ?></td>
                <td><?php echo $row['Price']; ?></td>
                <div class="edit">
                       <td>
                            <a href="http://localhost/class/exercise1/editProduct.php?ProductID=<?php echo $row['ProductID']; ?>">
                        <input type="button" value="Edit">
                            </a>
                        </td>
                    </div>
                <td><button>Delete</button></td>
            </tr>
            
        <?php
        }
        mysqli_close($conn);
        ?>
        <a href="http://localhost/class/exercise1/addProduct.php"><input type="submit" value="Add Product"></a>
    </table>
</body>