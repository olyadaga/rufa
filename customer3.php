<?php

/*session_start(); // Start the session

    if (!isset($_SESSION['fn'])) {
  // Redirect the user to the login page if not logged in
   header('location: customer3.php');
   exit;
   }*/
$server = "localhost";
$username = "root";
$password = "";
$dbname="dbs";
$conn = mysqli_connect($server, $username, $password, $dbname);

if (isset($_POST['submit'])) {
    if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['age']) && !empty($_POST['address1'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $zip_code = $_POST['zipcode'];

        $query = "INSERT INTO customer (firstname, lastname, age,address1, zip_code) VALUES ($fname, $lname, $age, $address, $zip_code)";
        
        $run = mysqli_query($conn, $query);
       
        if ($run) {
            echo "Record inserted successfully!";
        } else {
            echo "Not inserted your record";
        }
    } else {
        echo "All fields are required!";
    }
    mysqli_close($conn);

    // Set a cookie for the user's first name
   /* $cookie_name = "user_fname";
    $cookie_value = $fname;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day*/
}

?>

<html lang="en">
<head>
    <title>Order Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="customer2.css">
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
      <a class="link" href="Registerproduct.php">Register</a>
      <a class="link" href="login2.php">Login</a>
      <a class="link" href="contact.php">Contact</a>
    </p>
</div>
<div class="box4">
    <h1>Customer Information</h1>
    <form method="POST" action="customer3.php">

        <input type="text" id="fname" name="fname" placeholder="Enter Your First Name" required>
        
        <input type="text" id="lname" name="lname" placeholder="Enter Your Last Name" required>
        
        Age<input type="number" id="age" name="age" placeholder="Enter Your Age" required>
        
        <textarea id="address" name="address1" rows="4" cols="30" placeholder="Enter Your Address" required></textarea>
        
        <input type="text" id="zipcode" name="zipcode" placeholder="Enter Zip Code" required>

        <h1>Order Form</h1>
        Date:<input type="date" id="date" name="date"  required>
        Amount:<input type="number" id="number" name="amount" required>
        <input type="submit" value="Submit">
    </form>
    </div>
</body>

</html>