<?php
$servername = "localhost";
$username = "exercise1";
$password = "85H@hgdh)/N3nIg4";
$dbname = "exercise1";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$errorMessage = "";
$showError = false;

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

if ($email === "" || trim($email) === "") {
        $errorMessage = "Please enter your Email";
        $showError = true;
    }
    elseif ($password === "" || trim($password) === "") {
        $errorMessage = "Please enter your Password";
        $showError = true;
    }
    else {

        $query = "SELECT* FROM customers WHERE email ='" . $_POST['email'] . "' AND password = '" . $_POST['password'] . "'";
        $result = mysqli_query($conn, $query) or die("Couldn't execute query");

        $num_rows = mysqli_num_rows($result);

        if ($num_rows > 0) {
            header("Location:shop.php");
            exit();
        } else {
            $errorMessage = "Incorrect Password or Email";
            $showError = true;
        }
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    <link rel="stylesheet" href="css/customer.css">
</head>
<body>
    <div class="box">
        <div class="title">
            <h1>Welcome to Our Store</h1>
        </div>
        <div class="email">
            <form target="_self" method="POST" id="loginForm">
                <div class="info">
                    <div class="input1">
                        <h2>Email: </h2>
                        <input type="text" name="email" id="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    </div>
                    <div class="input2">
                        <h2> Password: </h2>
                        <input type="password" name="password">
                    </div>
                </div>

                <div class="error-box" id="errorBox">
                    <span id="errorMessage"><?php echo $showError ? htmlspecialchars($errorMessage) : ''; ?></span>
                </div>

                <div class="submit">
                    <input type="submit"> 
                </div>
            </form>
        </div>
    </div>

    <script>
        <?php if ($showError): ?>
            document.getElementById('errorBox').classList.add('show');
        <?php endif; ?>
    </script>
</body>
</html>