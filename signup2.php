<?php
$fname="";
$lname="";
$phone="";
$sex="";
$pass1="";
$pass2="";
$err=array();
$congra="";

$conn=mysqli_connect('localhost','root','','dbs');

if(isset($_POST['SIGNUP'])){
    $fname=mysqli_real_escape_string($conn,$_POST['fn']);
    $lname=mysqli_real_escape_string($conn,$_POST['ln']);
    $phone=mysqli_real_escape_string($conn,$_POST['phone']);
    $sex=mysqli_real_escape_string($conn,$_POST['sex']);
    $pass1=mysqli_real_escape_string($conn,$_POST['pass1']);
    $pass_hash=md5($pass1);
    $pass2=mysqli_real_escape_string($conn,$_POST['pass2']);
  
    if($pass1 !== $pass2){
        array_push($err,"The two passwords do not match!");
    }

    $user_check_query="SELECT * FROM users WHERE firstname='$fname' OR phone='$phone' LIMIT 1";
    $result=mysqli_query($conn,$user_check_query);
    $user=mysqli_fetch_assoc($result);

    if($user && $user['firstname'] === $fname){
        array_push($err,"Username Already Exists!");
    }
    if($user && $user['phone'] === $phone){
        array_push($err,"Phone Number Already Exists!");
    }

    if(count($err) === 0){
        $query="INSERT INTO users (firstname,lastname,phone,sex,password) VALUES ('$fname','$lname','$phone','$sex','$pass_hash')";
        mysqli_query($conn,$query);
        $congra="You Are Successfully Registered! Please Login.";
    }
    else{
        $congra="Username Exists! Try Again and Use Another Username.";
    }
} 
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup2.css">
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
      <a class="link" href="admin.php">Admin</a>
      <a class="link" href="contact.php">Contact</a>
    </p>
</div>
<div class="box2">
        <h1>SIGNUP HERE</h1>
        <!--<div class="err">
            <?php //echo $err; ?>
        </div>-->
        <?php echo $congra; ?>
        <form method="post" action="signup2.php">
            <input type="text" name="fn" id="" placeholder="Enter Firstname" required>
            <input type="text" name="ln" id="" placeholder="Enter Lastname" required>
            Phone Number:<input type="number" name="phone" id="phone" placeholder="Enter Phone Number" required><br>
            <label for="">Sex:</label>
            <input type="radio" name="sex" id="" value="Male" required>Male
            <input type="radio" name="sex" id="" value="Female" required>Female

            <input type="password" name="pass1" id="" placeholder="Enter Password">
            <input type="password" name="pass2" id="" placeholder="Confirm Password">
            <input type="submit" value="Signup" id="login" name="SIGNUP">
            If You Are a Member! 
            <a class="login" href="login2.php" >Login</a>
        </form>
    </div>
   
</body>

</html>