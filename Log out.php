<?php
session_start();
unset($_SESSION['Id']);
unset($_SESSION['Name']);
header("location:Log in.php");
die();
?>