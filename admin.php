<?php
session_start(); // Start the session

$username = "";
$password = "";
$err = "";

$conn = mysqli_connect('localhost', 'root', '', 'dbs');

if (isset($_POST['LOGIN'])) {
    $username = mysqli_real_escape_string($conn, $_POST['fn']);
    $password = mysqli_real_escape_string($conn, $_POST['pass']);

    if ($username === "admin" && $password === "1234") {
        // Authentication successful, set session variables and redirect to Register2.php
        $_SESSION['fname'] = $username; // Fixed the session variable assignment
        // Set a cookie for the admin
        $cookie_name = "admin";
        $cookie_value = $username;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        header('location: Registerproduct.php');
        exit;
    } else {
        $err = "Username or Password is incorrect!";
    }
}
?>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>Login page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login2.css">
    <link rel="dns-prefetch" href="//fonts.googlwapis.com">
    <meta name="robots" content="max-image-preview:large">
    <link rel="stylesheet" id="astra-google-fonts-css" href="https://fonts.googleapis.com/css?family=Heebo%3A400%2C600%7CEB+Garamond%3A400%2C500%2C600&amp;display=fallback&amp;ver=4.6.8" media="all">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
</head>
<body>
<div class="header1">
    <header>
    <div class="four1">
        <a href="home.php"><img src="Ruufa-logo1.jpg" alt="Company Logo" id="image1"></a>
        <p class="logo1">Rufa Design</p>
    </div>
    </header>
    <p class="links">
      <a class="link" href="home2.php">Home</a>
      <a class="link" href="contact.php">Contact</a>
    </p>
</div>
<div class="box">
        <h1>ADMIN LOGIN</h1>
        <div class="err">
            <?php echo $err;  ?>
        </div>
        <form method="post" action="admin.php">
            <input type="text" name="fn" id="" placeholder="Enter Username">
            <input type="password" name="pass" id="" placeholder="Enter Password">
            <input type="submit" value="Login" id="login" name="LOGIN">
            If you are a member!
            <a class="signup" href="login2.php">LOGIN HERE</a>
        </form>
    </div>
   
</body>