<?php
session_start();

$conn = mysqli_connect("localhost", "brianloo", "mDN@b_NanvTrDyW1", "brianloo");

$email = $_SESSION["email"];

// Get current user data
$sql = "SELECT * FROM student WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<?php
if (isset($_GET["error"])) {
    if ($_GET["error"] == "password") {
        echo "Password and Confirm Password do not match.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Edit Profile</title>
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
            <th>Name</th>
            <th>Password</th>
            <th>ConfirmPassword</th>
            <th>Year Joined</th>
      </tr>

      <form action="updateProfile.php" method="POST">
        <td>
            <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
        </td>

        <td>
            <input type="password" name="password" value="<?php echo $row['password']; ?>" required>
        </td>

        <td>
            <input type="password" name="confirmpassword" value="<?php echo $row['password']; ?>" required>
        </td>

        <td>
            <input type="number" name="yearjoin" value="<?php echo $row['yearjoin']; ?>" min="1900" max="<?php echo date('Y'); ?>" required>
        </td>
          <td><input type="submit" value="Save Changes"></td>
      </form>
      <a href="http://localhost/class/week1/profile.php"><input type="submit" value="Back"></a>
    </table>
  </body>
</html>