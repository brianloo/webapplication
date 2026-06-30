<?php
$conn = mysqli_connect("localhost", "brianloo", "mDN@b_NanvTrDyW1", "brianloo");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$ISBN = $_GET['ISBN'];

$query = "SELECT * FROM booklist WHERE ISBN='$ISBN'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Edit Book</title>
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
    <table width="800">
      <tr>
            <th>ISBN</th>
            <th>Title</th>
            <th>Author</th>
            <th>Description</th>
            <th>Price</th>
      </tr>

      <form action="updateBook.php" method="POST">
          <td><?php echo $row['ISBN']; ?></td>
          <td><input type="text" name="title" value="<?php echo $row['title']; ?>"></td>
          <td><input type="text" name="author" value="<?php echo $row['author']; ?>"></td>
          <td><input type="text" name="description" value="<?php echo $row['description']; ?>"></td>
          <td><input type="text" name="price" value="<?php echo $row['price']; ?>"></td>
          <td><input type="submit" value="Save Changes"></td>
      </form>
      <a href="http://localhost/class/week1/booklist.php"><input type="submit" value="Back"></a>
    </table>
  </body>
</html>