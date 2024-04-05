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

        header('location: home2.php');
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
        <a href="home2.php"><img src="Ruufa-logo1.jpg" alt="Company Logo" id="image1"></a>
        <p class="logo1">Rufa Design</p>
    </div>
    </header>
    <p class="links">
      <a class="link" href="home2.php">Home</a>
      <a class="link" href="admin.php">Admin</a>
      <a class="link" href="contact.php">Contact</a>
    </p>
</div>
<div class="box">
        <h1>LOGIN HERE</h1>
        <div class="err">
            <?php echo $err;  ?>
        </div>
        <form method="post" action="login2.php">
            <input type="text" name="fn" id="" placeholder="Enter Username">
            <input type="password" name="pass" id="" placeholder="Enter Password">
            <input type="submit" value="Login" id="login" name="LOGIN">
            Not Yet a Member? 
            <a class="signup" href="signup2.php">Sign up</a>
        </form>
    </div>
   
</body>

</html>