<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Registerproduct.css">
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
      <a class="link" href="login2.php">Logout</a>
      <a class="link" href="contact.php">Contact</a>
    </p>
</div>
<div class="box3">

        <h1>Add New Item<h2>

        <form method="POST" action="home2.php" enctype="multipart/form-data">           
            <input type="text" id="model" name="model" placeholder="Enter Model"> 
            <input type="text" id="brand" name="brand" placeholder="Enter Brand">      
            <textarea id="specification" name="description" placeholder="Enter Description"></textarea>
            <input class="upload" type="file" name="file">     
            <input type="text" id="price" name="price" placeholder="Enter Item Price">
            <input class="upload" type="submit" name="submit" value="Upload File"></input>
        </form>
</div>
</body>

</html>