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
        $query="INSERT INTO users (firstname,lastname,phone,sex,password) VALUES ('$fname','$lname','$phone','$sex','$pass1')";
        mysqli_query($conn,$query);
        $congra="You Are Successfully Registered! Please Login.";
    }
    else{
        $congra="Username Exists! Try Again and Use Another Username.";
    }
} 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Singup Page</title>
    <link rel="stylesheet" href="signup.css">
    
</head>
<body>
      <div class="box2">
        <h1>SIGNUP HERE</h1>
        <!--<div class="err">
            <?php //echo $err; ?>
        </div>-->
        <?php echo $congra; ?>
        <form method="post" action="signup.php">
            <input type="text" name="fn" id="" placeholder="Enter Firstname" required>
            <input type="text" name="ln" id="" placeholder="Enter Lastname" required>
            Phone Number:<input type="number" name="phone" id="phone" placeholder="Enter Phone Number" required>
            <label for="">Sex:</label>
            <input type="radio" name="sex" id="" value="Male" required>Male
            <input type="radio" name="sex" id="" value="Female" required>Female

            <input type="password" name="pass1" id="" placeholder="Enter Password">
            <input type="password" name="pass2" id="" placeholder="Confirm Password">
            <input type="submit" value="Signup" id="login" name="SIGNUP">
            If You Are a Member! 
            <a class="login" href="login.php" >LOGIN</a>
        </form>
    </div>
</body>
</html>