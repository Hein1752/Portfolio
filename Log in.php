<?php
session_start();
$connection = mysqli_connect("localhost","root","","portfolio");
error_reporting(E_ALL & ~E_NOTICE);
// error_reporting(E_ALL & ~E_WARNING);
date_default_timezone_set('Asia/Yangon');

if (isset($_POST['submit'])) 
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $select = "SELECT * FROM user where Email = '$email' and Password = '$password'";
    $insert = "INSERT into contact(Email,Password) values('$email','$password')";
    $runselect = mysqli_query($connection,$select);
    $countrow = mysqli_num_rows($runselect);
    if ($countrow == 0) 
    {
        echo"<script>alert('Email or Password may be wrong!')</script>";
    } 
    else 
    { 
        $fetchdata = mysqli_fetch_array($runselect);
        $email = $fetchdata['Email'];
        $password = $fetchdata['Password'];
        $_SESSION['Email'] = $email;
        $_SESSION['Password'] = $password;
        echo"<script>alert('Login Successful')</script>";
        $name = $fetchdata['Name'];
        $_SESSION['Name'] = $name;
        header('location: Portfolio.php');
        
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
    <!-- <link rel="stylesheet" href="all.min.css"> -->
    <script src="https://kit.fontawesome.com/9fe50ff802.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="register.css">
    <script defer src="./login-form.js"></script>
    <style>
        .form-container form{
            width: 300px;
        }
        .form-group .form-lb{
            padding-top: 20px;
            left: 70px;
        }
        @media only screen and (max-width: 350px){
            .form-group .form-lb{
                position: absolute;
                padding-top: 20px;
                left: 40px;
                font-size: 13px;
                pointer-events: none;
                transition: 0.15s all ease;
            }
        }
    </style>
</head>
<body class="img">
<div class="form-container">

    <form id="form" method="post">
        <h3>Login</h3>
        <div class="form-group">
            <div class="input-group">
                <input type="email" id="email" name="email"  placeholder="Email">
                <label class="form-lb">Email</label>
                <div class="error"></div>
            </div>
            <div class="input-group">
                <input type="password" name="password" id="pass"  placeholder="Password">
                <label class="form-lb">Password</label>
                <span class="eye" onclick="passfunction()">
                    <i id="hide1" class="fa fa-eye"></i>
                    <i id="hide2" class="fa fa-eye-slash"></i>
                </span>
                <div class="error"></div>
            </div>
        </div>
        <input type="submit" name="submit" value="Login" class="form-btn">
        <p>already have an account? <a href="Sign Up.php" class="link">Sign Up</a></p>
    </form>
    <script>
        function passfunction() {
            var a = document.getElementById("pass");
            var b = document.getElementById("hide1");
            var c = document.getElementById("hide2");
    
            if (a.type === 'password') {
                a.type = "text";
                b.style.display = "block";
                c.style.display = "none";
            }
            else{
                a.type = "password";
                b.style.display = "none";
                c.style.display = "block";
            }
        }
    </script>
</div>
</body>
</html>