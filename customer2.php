<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "dbs";
$conn = mysqli_connect($server, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['age']) && !empty($_POST['address1']) && !empty($_POST['zipcode']) && !empty($_POST['date']) && isset($_POST['amount'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $age = $_POST['age'];
        $address = $_POST['address1'];
        $zipcode = $_POST['zipcode'];
        $date = $_POST['date'];
        $amount = $_POST['amount'];

        // Inserting customer information
        $query_customer = "INSERT INTO customer (firstname, lastname, age, address, zip_code) VALUES ('$fname', '$lname', $age, '$address', '$zipcode')";
        if (mysqli_query($conn, $query_customer)) {
            // Retrieving inserted customer id
            $customer_id = mysqli_insert_id($conn);

            // Retrieving item id from the item table (You need to adjust this query according to your item table structure)
            $item_query = "SELECT Item_Id FROM item";
            $result_item = mysqli_query($conn, $item_query);
            if ($result_item && mysqli_num_rows($result_item) > 0) {
                $row = mysqli_fetch_assoc($result_item);
                $item_id = $row['Item_Id'];

                // Inserting order information
                $order_query = "INSERT INTO orders (Custome_Id,It_Id, date, amount) VALUES ('$customer_id', '$item_id', '$date', '$amount')";
                if (mysqli_query($conn, $order_query)) {
                    echo "Information inserted successfully.";
                } else {
                    echo "Error inserting order information: " . mysqli_error($conn);
                }
            } else {
                echo "Error retrieving item information: " . mysqli_error($conn);
            }
        } else {
            echo "Error inserting customer information: " . mysqli_error($conn);
        }
    } else {
        echo "All fields are required!";
    }

    mysqli_close($conn);
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
      <a class="link" href="admin.php">Admin</a>
      <a class="link" href="login2.php">Logout</a>
      <a class="link" href="contact.php">Contact</a>
    </p>
</div>
<div class="box4">
    <h1>Customer Information</h1>
    <form method="POST" action="customer2.php">

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