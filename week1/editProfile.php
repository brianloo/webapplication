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

// SQL to update a record
$sql = "UPDATE student SET name='hey' WHERE email= '".$_SESSION["email"]."'";

if (mysqli_query($conn, $sql)) {
  echo "Edit Saved Successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>