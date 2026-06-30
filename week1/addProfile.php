<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }
    </style>

</head>
<body>
    <button><a class="link" href="booklist.php">Back</a></button>
    <a href="http://localhost/class/week1/"><input type="submit" value="LogOut"></a>
    <table width="600">
        <tr>
            <th>Password</th>
            <th>Confirm Password</th>
            <th>Name</th>
            <th>Year Joined</th>
        </tr>
        <tr>
            <form action="insertProfile.php" method="POST">
                <td><input type="text" name="Password"></td>
                <td><input type="text" name="ConfirmPassword"></td>
                <td><input type="text" name="Name"></td>
                <td><input type="text" name="YearJoined"></td>
                <td><input type="submit" value="Submit"></td>
            </form>
        </tr>
    
</body>
</html>