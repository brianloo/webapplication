<?php
$servername = "localhost";
$username = "brianloo";
$password = "mDN@b_NanvTrDyW1";
$dbname = "brianloo";

session_start();
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$session_email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            <th>Email</th>
            <th>Year Joined</th>
        </tr>
        <?php
        
        $query = "SELECT * FROM student WHERE email ='$session_email'";

        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
        ?> 
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['yearjoin']; ?></td>
                <td><a href="http://localhost/class/week1/editProfile.php"><input type="button" value="Edit"></a></td>
            </tr>
            
        <?php
        }
        mysqli_close($conn);
        ?>
        <a href="http://localhost/class/week1/booklist.php"><input type="submit" value="Back"></a>
        <a href="http://localhost/class/week1/addProfile.php"><input type="submit" value="Add Profile"></a>
    </table>
</body>
</html>