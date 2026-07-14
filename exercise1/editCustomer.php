<?php
$conn = mysqli_connect("localhost", "exercise1", "85H@hgdh)/N3nIg4", "exercise1");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$CustomerID = $_GET['CustomerID'];

$query = "SELECT * FROM customers WHERE CustomerID='$CustomerID'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$errorMessage = "";

if (isset($_GET["error"])) {
    if ($_GET["error"] == "shortpassword") {
        $errorMessage = "Password must be at least 6 characters long";
    }
    elseif ($_GET["error"] == "password") {
        $errorMessage = "Passwords do not match";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Edit Customer</title>
      <link rel="stylesheet" href="css/common.css">
      <link rel="stylesheet" href="css/editCustomer.css">
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
    <?php
        if ($errorMessage != "") {
            echo "<p style='color:red;'>$errorMessage</p>";
        }
    ?>
    <table width="800">
        
      <tr>
            <th>Customer's Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Confirm Password</th>
            <th>Phone Number</th>
      </tr>

        <form action="updateCustomer.php" method="POST">
            <input type="hidden" name="CustomerID" value="<?php echo $row['CustomerID']; ?>">

            <td>
                <input type="text" name="CustomerName" value="<?php echo $row['CustomerName']; ?>" required>
            </td>

            <td>
                <input type="text" name="email" value="<?php echo $row['Email']; ?>" required>
            </td>

            <td>
                <input type="password" name="password" required>
            </td>

            <td>
                <input type="password" name="confirm_password" required>
            </td>

            <td>
                <input type="text" name="phone_number" value="<?php echo $row['PhoneNumber']; ?>" required>
            </td>

            <td>
                <input type="submit" value="Save Changes">
            </td>
        </form>
      <a href="http://localhost/class/exercise1/shop.php"><input type="submit" value="Back"></a>
    </table>
  </body>
</html>