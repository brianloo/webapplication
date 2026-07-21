<?php
$servername = "localhost";
$username = "brianloo";
$password = "mDN@b_NanvTrDyW1";
$dbname = "brianloo";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$department = isset($_GET['department']) ? $_GET['department'] : '';

if ($department != '') {
    $query = "SELECT ID, Name, Department FROM department WHERE Department = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $department);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    $query = "SELECT ID, Name, Department FROM department";
    $result = mysqli_query($conn, $query);
}

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="employees.csv"');

$output = fopen('php://output', 'w');

fputcsv($output, ['No', 'Employee Name', 'Department']);

$sn = 1;
while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, [$sn, $row['Name'], $row['Department']]);
    $sn++;
}

fclose($output);
exit;
?>