<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link rel="dns-prefetch" href="//fonts.googlwapis.com">
    <meta name="robots" content="max-image-preview:large">
    <title>Home</title>
    <link rel="stylesheet" id="astra-google-fonts-css" href="https://fonts.googleapis.com/css?family=Heebo%3A400%2C600%7CEB+Garamond%3A400%2C500%2C600&amp;display=fallback&amp;ver=4.6.8" media="all">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
</head>

<body>
<div class="header">
        <header>
            <div class="four">
            <a href="home.php"><img src="Rufa1.jpg" alt="Company Logo" id="image"></a>
            <h1>Rufa Design</h1><br> 
            </div>  
        </header>
        <button id="one" onclick="location.href='home.php'">Home</button> 
        <button id="three" onclick="location.href='Register2.php'">Register</button>
        <button onclick="location.href='login.php'" id="four">Logout</button>
       
    </div>
    <?php
    // Database connection
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'dbs';
    $err="";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['submit'])){
        $model = mysqli_real_escape_string($conn, $_POST['model']);
        $brand = mysqli_real_escape_string($conn, $_POST['brand']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $price = mysqli_real_escape_string($conn, $_POST['price']);

        $file=$_FILES['file'];
        $filename=$_FILES['file']['name'];
        $fileTmpName=$_FILES['file']['tmp_name'];
        $fileSize=$_FILES['file']['size'];
        $fileError=$_FILES['file']['error'];
        $fileType=$_FILES['file']['type'];

        $fileExt=explode('.',$filename);
        $fileActualExt=strtolower(end($fileExt));

        $allowed=array('jpg','jpeg','png');

        if (in_array($fileActualExt,$allowed)) {
            if($fileError===0){
                if ($fileSize < 1000000) {
                    $fileNameNew=uniqid('',true).".".$fileActualExt;
                    $fileDestination='uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName,$fileDestination);

                    // Insert image path into the database
                    $sql = "INSERT INTO item (image_path,model,brand,description,price) VALUES ('$fileDestination','$model','$brand','$description','$price')";
                    
                    if ($conn->query($sql) === TRUE) {
                        $err="Image uploaded successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
                else{
                    $err="Your File is Too Big!";
                }
            }
            else{
                $err="There was error in uploading your file!";
            }
        }
        else{
            $err="You cannot upload file of this type!";
        }
    }

 
    ?>
    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px;">
    <?php
    $sql = "SELECT * FROM item";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div style='text-align: center; border: 1px solid #ccc; padding: 20px;'>";
            echo "<img src='" . $row['image_path'] . "' alt='Uploaded Image' style='width: 200px; height: 200px;'><br>";
            echo "<h2 style='font-size: 18px; color: blue; margin: 10px 0;'>Model: ".$row['model']."</h2>";
            echo "<h3 style='font-size: 16px; color: black; margin: 10px 0;'>Brand: ".$row['brand']."</h3>";
            echo "<p style='font-size: 14px; color: #333; margin: 10px 0;'>Description: ".$row['description']."</p>";
            echo "<p style='font-size: 18px; color: green; margin: 10px 0;'>Price: ".$row['price']."</p>";
            echo "<a href='customer.php' style='text-decoration: none; background-color: #4CAF50; color: white; padding: 10px 20px; border-radius: 5px;'>Order Now</a>";
            echo "</div>";
        }
    } else {
        echo "<p style='text-align: center;'>0 results</p>";
    }

    mysqli_close($conn);
    ?>
</div>

</body>
</html>
