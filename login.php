<?php
session_start(); // Start the session

$fname = "";
$password = "";
$err = "";

$conn = mysqli_connect('localhost', 'root', '', 'dbs');

if (isset($_POST['LOGIN'])) {
    $fname = mysqli_real_escape_string($conn, $_POST['fn']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);

    $sql = "SELECT * FROM users WHERE firstname='" . $fname . "' AND password='" . $password . "' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (empty($fname) || empty($password)) {
        $err = "Username and password are required!";
    } else if (mysqli_num_rows($result) == 1) {
        // Authentication successful, set session variables and redirect to home.php
        $_SESSION['fname'] = $fname;

        // Set a cookie for the logged-in user
        $cookie_name = "user";
        $cookie_value = $fname;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

        header('location: home.php');
        exit;
    } else {
        $err = "Username or Password is incorrect!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login2.css">
    
</head>
<body>
    <div class="box">
        <h1>LOGIN HERE</h1>
        <div class="err">
            <?php echo $err;  ?>
        </div>
        <form method="post" action="login.php">
            <input type="text" name="fn" id="" placeholder="Enter Username">
            <input type="password" name="pass" id="" placeholder="Enter Password">
            <input type="submit" value="Login" id="login" name="LOGIN">
            Not Yet a Member? <a href="signup.php" style="color:#ffc107">SIGNUP</a>
        </form>
    </div>
</body>
</html>
