<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname="dbs";
$conn = mysqli_connect($server, $username, $password, $dbname);

if (isset($_POST['submit'])) {
    if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['age']) && !empty($_POST['address'])) {
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
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Information Form</title>
    <link rel="stylesheet" href="customer.css">
</head>
<body>
    <a href="login.php" id="one">Logout</a>
    <a href="PRegister.php" id="two">Register Product</a>
   <div class="box4">
    <h1>Customer Information</h1>
    <form method="POST" action="customer.php">

        <input type="text" id="fname" name="fname" placeholder="Enter Your First Name" required>
        
        <input type="text" id="lname" name="lname" placeholder="Enter Your Last Name" required>
        
        Age<input type="number" id="age" name="age" placeholder="Enter Your Age" required>
        
        <textarea id="address" name="address" rows="4" cols="30" placeholder="Enter Your Address" required></textarea>
        
        <input type="text" id="zipcode" name="zipcode" placeholder="Enter Zip Code" required>

        <h1>Order Form</h1>
        Date:<input type="date" id="date" name="date"  required>
        Amount:<input type="number" id="number" name="amount" required>
        <input type="submit" value="Submit">
    </form>
    </div>
</body>
</html>
