<?php
$server = "localhost";
$dbname = "dbs";
$username = "root";
$password = "";
$con = mysqli_connect($server, $username, $password, $dbname);
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['submit'])) {
    if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['age']) && !empty($_POST['address'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $zip_code = $_POST['zipcode'];
        $query = "INSERT INTO customer (firstname, lastname, age, address, zip_code) VALUES ('$fname', '$lname', '$age', '$address', '$zip_code')";
        $query2 ="INSERT INTO orders (date,amount) VALUES ('$date','$amount')";
        $run = mysqli_query($con, $query);
        $run = mysqli_query($con, $query2);
        if ($run) {
            echo "Record inserted successfully!";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($con);
        }
    } else {
        echo "All fields are required!";
    }
    mysqli_close($con);
}
?>