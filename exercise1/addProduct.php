<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="css/addProduct.css">
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

    <button><a class="link" href="shop.php">Back</a></button>
    <table width="600">
        <tr>
            <th>ProductID</th>
            <th>ProductName</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
        <tr>
            <form action="insertProduct.php" method="POST">
                <td><input type="text" name="ProductID"></td>
                <td><input type="text" name="ProductName"></td>
                <td><input type="text" name="Description"></td>
                <td><input type="text" name="Price"></td>
                <td><input type="submit" value="Add Product"></td>
            </form>
        </tr>
    </table>
    
</body>
</html>