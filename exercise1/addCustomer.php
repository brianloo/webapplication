<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Customer</title>
    <link rel="stylesheet" href="css/addCustomer.css">
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

    <button><a class="link" href="shop.php">Back</a></button>
    <table width="600">
        <tr>
            <th>Customer Name</th>
            <th>Customer ID</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Password</th>
            <th>Confirm Password</th>
        </tr>
        <tr>
            <form action="insertCustomer.php" method="POST">
                <td><input type="text" name="CustomerName"></td>
                <td><input type="text" name="CustomerID"></td>
                <td><input type="text" name="Email"></td>
                <td><input type="text" name="PhoneNumber"></td>
                <td><input type="text" name="Password"></td>
                <td><input type="text" name="ConfirmPassword"></td>
                <td><input type="submit" value="Add Customer"></td>
            </form>
        </tr>
    </table>
    
</body>
</html>