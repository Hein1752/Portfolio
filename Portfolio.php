<?php
session_start();
$connection = mysqli_connect("localhost","root","","portfolio");
error_reporting(E_ALL & ~E_NOTICE);
// error_reporting(E_ALL & ~E_WARNING);
date_default_timezone_set('Asia/Yangon');
if(empty($_SESSION['Name']))
{
    header('location:Log in.php');
}
if(!empty($_SESSION['Name']))
{
    $name = $_SESSION['Name'];
}
if (isset($_POST['submit'])) 
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $description = $_POST['comment'];
    $insert = "INSERT into contact(Name,Email,Description) values('$name','$email','$description')";
    $runinsert = mysqli_query($connection,$insert);
    if ($runinsert) 
    {
        echo"<script>alert('Complete')</script>";
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <!-- <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/all.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9fe50ff802.js" crossorigin="anonymous"></script>
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script type="text/javascript">
        function DisableBackButton(){
            window.history.forward();
        }
        DisableBackButton();
        window.onload = DisableBackButton;
        window.onpageshow = function(evt) {if (evt.persisted) DisableBackButton()}
        window.onunload = function() {void (0)}
    </script>
    <link rel="stylesheet" href="Portfolio.css">
</head>
<body>
    <div id="header">
        <div class="container">
            <nav>
                <h1 class="h3">Welcome <?php session_start(); echo $_SESSION['Name'] ?></h1>
                <ul class="tab" id="sidemenu">
                    <li><a href="#header">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#service">Services</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="Log out.php">Log out</a></li>
                    <i class="fas fa-times" onclick="closemenu()"></i>
                </ul>
                <i class="fas fa-bars" onclick="openmenu()"></i>
            </nav>
            <div class="header-text">
                <h2>Web Developer</h2>
                <h1>Hi, I'm <span>Hein Lin Aung</span></h1>
            </div>
        </div>
    </div>
    <div class="container p-4" id="about">
        <div class="d-lg-flex d-md-flex d-sm-block" id="about">
            <div class="image pt-md-4 pe-md-5 ps-md-4 pt-lg-4 pe-lg-5 ps-lg-4">
                <img src="Image/hein.jpg" width="250px" class=" rounded" alt="...">
            </div>
            <div class="card-body me-md-5 me-lg-5 pt-md-4 pt-lg-4">
                <h1 class="about fw-bold">About Me</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, fugit sint perferendis neque qui assumenda provident vel facilis illo molestiae animi alias, reiciendis porro earum explicabo amet est excepturi! Amet?</p>
                <div class="tab-titles d-flex mt-4 mb-3">
                    <p class="tab-links active-link link me-4 fs-5 fw-bold" onclick="opentab('skills')">Skills</p>
                    <p class="tab-links link me-4 fs-5 fw-bold" onclick="opentab('experience')">Experience</p>
                    <p class="tab-links link fs-5 fw-bold" onclick="opentab('education')">Education</p>
                </div>
                <div class="tab-contents active-tab" id="skills">
                    <ul class="list-group">
                        <li>HTML</li>
                        <li>CSS</li>
                        <li>Java Script</li>
                        <li>Bootstrap</li>
                        <li>JQuery</li>
                        <li>PHP</li>
                        <li>My SQL</li>
                    </ul>
                </div>
                <div class="tab-contents" id="experience">
                    <ul class="list-group">
                        <li>Electrical Experience 1 Year(Angel Plastic)</li>
                        <li>No Experience</li>
                    </ul>
                </div>
                <div class="tab-contents" id="education">
                    <ul class="list-group">
                        <li><span>2020(Jun - Oct)</span><br>AB Programming</li>
                        <li><span>2019 - 2020</span><br>SITE(School of Industrial Training and Education)</li>
                        <li><span>2018 - 2019</span><br>No(1)Basic Education High School Insein(Grade - 10)</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>   
    <section class="container py-5 px-5" id="service">
        <h1 class="pb-4 pt-4">My Services</h1>
        <div class="row g-5 pe-5 service">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card bg-secondary">
                    <div class="card-body rounded-1">
                        <i class="fa-brands fa-codepen fa-2xl pb-4" style="color: #e6e7eb;"></i>
                        <h2 class="text-white">Web Design</h2>
                        <p class="card-text text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, neque eius! Iste, quisquam reprehenderit in fuga architecto veniam quod eveniet? Magni, quis fuga ipsa non aut quod rem nisi harum.</p>
                        <a href="#" class="learn">learn more</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card bg-secondary">
                    <div class="card-body rounded-1">
                        <i class="fa-brands fa-dev fa-2xl pb-4" style="color: #e6e7eb;"></i>
                        <h2 class="text-white">Web Dev</h2>
                        <p class="card-text text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, neque eius! Iste, quisquam reprehenderit in fuga architecto veniam quod eveniet? Magni, quis fuga ipsa non aut quod rem nisi harum.</p>
                        <a href="#" class="learn">learn more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        
    </section>
    <div id="contact" class="mb-5">
        <div class="container">
            <div class="row">
                <div class="contact col-12 col-md-6 col-lg-6">
                    <h1>Contact Me</h1>
                    <p><i class="fa-solid fa-envelope me-3" style="color: #2562cb;"></i><a class="email">hlinaung407@gmail.com</a></p>
                    <p><i class="fa-solid fa-phone me-3" style="color: #245cbc;"></i><a class="phone" href="">09-764491835</a></p>
                    <div class="icon">
                        <a href="" class="pe-2"><i class="fa-brands fa-facebook" style="color: #275db9;"></i></a>
                        <a href="" class="p-2"><i class="fa-brands fa-facebook-messenger" style="color: #275db9;"></i></a>
                        <a href="" class="p-2"><i class="fa-brands fa-viber" style="color: #390fd2;"></i></a>
                        <a href="" class="p-2"><i class="fa-brands fa-telegram" style="color: #0a5ae6;"></i></a>
                    </div>
                    <a href="Image/CURRICULUM VITAE.pdf" class="btn btn-primary mt-2 mb-4 rounded-pill" download href="#" role="button">Download CV</a>
                </div>
                <form class="col-12 col-md-6 col-lg-6" method="post">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputText" placeholder="Your Name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Comment</label>
                        <textarea class="form-control" name="comment" id="exampleInputComment1" style="height: 100px;"></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary rounded-pill">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        var tablinks = document.getElementsByClassName("tab-links");
        var tabcontents = document.getElementsByClassName("tab-contents");
        function opentab(tabname) {
            for(tablink of tablinks){
                tablink.classList.remove("active-link");
            }
            for(tabcontent of tabcontents){
                tabcontent.classList.remove("active-tab");
            }
            event.currentTarget.classList.add("active-link");
            document.getElementById(tabname).classList.add("active-tab");
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var sidemeu = document.getElementById("sidemenu");

        function openmenu(){
            sidemeu.style.right = "0";
        }
        function closemenu(){
            sidemeu.style.right = "-200px";
        }
    </script>
    <footer class="container-fluid bg-secondary">
        <div class="border-top border-top-1 py-4 text-center">
            Copyright &copy; Hein Lin Aung
        </div>
    </footer>
</body>
</html>