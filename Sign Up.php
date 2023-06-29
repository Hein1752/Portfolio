<?php
$connection = mysqli_connect("localhost","root","","portfolio");
error_reporting(E_ALL & ~E_NOTICE);
// error_reporting(E_ALL & ~E_WARNING);
date_default_timezone_set('Asia/Yangon');

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $insert = "INSERT into user(Name,Email,Password) values('$name','$email','$password')";
    $runinsert = mysqli_query($connection,$insert);
    if($runinsert)
    {
        echo"<script>alert('Account Successfully Created.')</script>";
        header("location:Sign Up.php");
    }
    else
    {
        echo"<script>alert('Fail!')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="register.css">
    <!-- <link rel="stylesheet" href="all.min.css"> -->
    <script src="https://kit.fontawesome.com/9fe50ff802.js" crossorigin="anonymous"></script>
    <script defer src="./form.js"></script>
    <script type="text/javascript">
        function DisableBackButton(){
            window.history.forward();
        }
        DisableBackButton();
        window.onload = DisableBackButton;
        window.onpageshow = function(evt) {if (evt.persisted) DisableBackButton()}
        window.onunload = function() {void (0)}
    </script>
</head>
<body class="img">
    <div class="form-container">

        <form action="" id="form" method="post">

            <h3>Sign Up</h3>

            <div class="form-group">
                <div class="input-group">
                    <input type="text" id="username" name="name"  placeholder="Name">
                    <label class="form-lb">Name</label>
                    <div class="error"></div>
                </div>
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
                <div class="input-group">
                    <input type="password" name="cpassword" id="cpass"  placeholder="Confirm Password">
                    <label class="form-lb">Confirm Password</label>
                    <span class="eye" onclick="cpassfunction()">
                        <i id="hide3" class="fa fa-eye"></i>
                        <i id="hide4" class="fa fa-eye-slash"></i>
                    </span>
                    <div class="error"></div>
                </div>
            </div>
            <input type="submit" name="submit" value="Sign up" class="form-btn">
            <p>already have an account? <a href="Log in.php" class="link">Login</a></p>
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
            function cpassfunction() {
                var a = document.getElementById("cpass");
                var b = document.getElementById("hide3");
                var c = document.getElementById("hide4");

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