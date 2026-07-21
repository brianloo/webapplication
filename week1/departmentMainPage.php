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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management</title>
    <style>
        table {
            border-collapse: collapse;
            width: 800px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

<form method="GET" action="">
    <label for="department">Filter by Department:</label>
    <select name="department" id="department">
        <option value="">All</option>
        <option value="HR" <?php if ($department == 'HR') echo 'selected'; ?>>HR</option>
        <option value="IT" <?php if ($department == 'IT') echo 'selected'; ?>>IT</option>
        <option value="Finance" <?php if ($department == 'Finance') echo 'selected'; ?>>Finance</option>
    </select>
    <button type="submit">Filter</button>

    <a href="downloadCSV.php?department=<?php echo urlencode($department); ?>">
    <button type="button">Download CSV</button>
    </a>
</form>

<br>

<table>
    <tr>
        <th>ID</th>
        <th>Employee Name</th>
        <th>Department</th>
    </tr>

    <?php
    if ($department != '') {
        $query = "SELECT * FROM department WHERE Department = ?";
        $stmt = mysqli_prepare($conn, $query);
        if (!$stmt) {
            die("Prepare failed: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "s", $department);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
    } else {
        $query = "SELECT * FROM department";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
    }

    $sn = 1;
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
            <td><?php echo $sn; ?></td>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['Department']; ?></td>
        </tr>
    <?php
        $sn++;
    }
    ?>
</table>

</body>
</html>