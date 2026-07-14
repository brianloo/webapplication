<?php
$conn = mysqli_connect("localhost", "exercise1", "85H@hgdh)/N3nIg4", "exercise1");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$ProductID = $_GET['ProductID'];

$query = "SELECT * FROM products WHERE ProductID='$ProductID'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_GET['error']) && $_GET['error'] == 'price') {
    echo "Price must be a valid number.";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Edit Product</title>
      <link rel="stylesheet" href="css/common.css">
      <link rel="stylesheet" href="css/editProduct.css">
  </head>

  <style>
      table {
          border-collapse: collapse;
      }

      table, th, td {
          border: 1px solid black;
      }
  </style>

  <body>
    <div class="sidebar">
            <a href="">Main Page</a>
            <a href="http://localhost/class/exercise1/shop.php">Customers</a>
            <a href="http://localhost/class/exercise1/product.php">Products</a>
            <a href="">Orders</a>
            <a href="http://localhost/class/exercise1/customer.php">Log Out</a>
    </div>
    <table width="800">
        
      <tr>
            <th>Product Name</th>
            <th>Description</th>
            <th>Price</th>
      </tr>

        <form action="updateProduct.php" method="POST">
            <input type="hidden" name="ProductID" value="<?php echo $row['ProductID']; ?>">

            <td>
                <input type="text" name="ProductName" value="<?php echo $row['ProductName']; ?>" required>
            </td>

            <td>
                <input type="text" name="Description" value="<?php echo $row['Description']; ?>" required>
            </td>

            <td>
                <input type="text" name="Price" value="<?php echo $row['Price']; ?>" step="0.01" required>
            </td>

            <td>
                <input type="submit" value="Save Changes">
            </td>
        </form>
      <a href="http://localhost/class/exercise1/shop.php"><input type="submit" value="Back"></a>
    </table>
  </body>
</html>