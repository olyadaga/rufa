<!DOCTYPE html?
<html>
    <head>
    <title>Successfully Ordered</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="forms.css">
        <link rel="stylesheet" href="home.css">
    </head>
    <body>
    <div class="header">
        <header>
            <div class="four">
            <img src="Rufa1.jpg" alt="Company Logo" id="image">
            <h1>Rufa Design</h1> <br> 
            </div>  
        </header>
        <button id="one" onclick="location.href='home.html'">Home</button> <button id="three" onclick="location.href='service.html'">Our Product</button><button type="button" id="two" onclick="location.href='contact.html'">Contact</button> <button type="button" id="three" onclick="location.href='about.html'">About Us</button>
        <button onclick="location.href='login.html'" id="four">Login</button>
        <button onclick="location.href='signup.html'" id="five">Sign Up</button>
    </div>
<?php
    $country = $_GET["country"];
    $region = $_GET["region"];
    $first_name = $_GET["first_name"];
    $last_name = $_GET["last_name"];
    $phone_number = $_GET["phone_number"];
    $street = $_GET["street"];
    $kebele = $_GET["kebele"];
    $state = $_GET["state"];
    $town = $_GET["town"];
    $zip_code = $_GET["zip_code"];

    
    echo "<h2>Order Confirmation</h2>";
    echo "<p><b>Country:</b> $country</p>";
    echo "<p><b>Region:</b> $region</p>";
    echo "<p><b>First Name:</b> $first_name</p>";
    echo "<p><b>Last Name:</b> $last_name</p>";
    echo "<p><b>Phone Number:</b> $phone_number</p>";
    echo "<p><b>Address:</b> <br><b>Street:</b>$street,<br><b>Kebele</b>:$kebele ,<br><b>State:</b>$state,<br><b>Town:</b>$town,<br><b>Postal Code:</b>$zip_code</p>";
?>
<p><strong>Successfully Ordered.</strong> If there is a problem with your form <a href="form.html"><strong>Edit It Here</strong></a></p>
</body>
</html>