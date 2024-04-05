<?php

session_start(); // Start the session

    if (!isset($_SESSION['fname'])) {
  // Redirect the user to the login page if not logged in
   header('location: login.php');
   exit;
   }
$server = "localhost";
$username = "root";
$password = "";
$dbname="dbs";
$conn = mysqli_connect($server, $username, $password, $dbname);

if (isset($_POST['submit'])) {
    if (!empty($_POST['fn']) && !empty($_POST['email']) && !empty($_POST['comment'])){
        $fname = $_POST['fn'];
        $email = $_POST['email'];
        $comment = $_POST['comment'];

        $query = "INSERT INTO contact (fullname,email,comment) VALUES ('$fname','$email','$comment')";
        
        $run = mysqli_query($conn,$query);
       
        if ($run) {
            echo "Record inserted successfully!";
        } else {
            echo "Not inserted your record";
        }
    } else {
        echo "All fields are required!";
    }
    mysqli_close($conn);

    $cookie_name = "user";
    $cookie_value = $_SESSION['fname'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
}

?>


<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contact.css">
    <link rel="dns-prefetch" href="//fonts.googlwapis.com">
    <meta name="robots" content="max-image-preview:large">
    <title>Contact Page</title>
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
      <a class="link" href="admin.php">Admin</a>
      <a class="link" href="login.php">Logout</a>
      
    </p>
</div>
<div class="box">
        <h1>Contact</h1>
        <h2>Send a Message</h2>
        <form method="post" action=" ">
            <input type="text" name="fn" placeholder="Full name"><br>
            <input type="email" name="email" placeholder="Email address">
            <textarea cols="25" rows="4" placeholder="Your message" name="comment"></textarea><br>
            <input type="submit" value="Send"  name="submit">
            <p>Contact Rufa Design Team!</p><br>
            <P>For more information Our Telegram link is <a href="https://t.me/rufadesign">Here </a></P>
        </form>
    </div>
</body>

</html>