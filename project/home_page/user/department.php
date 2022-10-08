<?php
session_start();
if($_SESSION['user_username']=='')
{
    header("location:http://localhost/project/home_page/login.php ");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dedpartment.css">
    <link rel="stylesheet" href="index.css">
    <title>Department</title>
</head>

<body>
    <div class="header">
        <img class="main" src="main.jpg" usemap="#home">
        <map name="home">
            <area shape="rect" coords="1,2,248,235" href="index.php">
        </map>

    </div>
    <nav class="nav1">
        <div>
            <ul>
                <li><a id="nava" href="index.php">Home</a></li>
                <li><a id="nava" href="bookapp.php">Book Appointment</a></li>
                <li><a id="nava" href="about_us.html">About Us</a></li>
                <li><a id="nava" href="department.php">Department</a></li>
                <li><a id="nava" href="feedback.php">Feedback</a></li>
            </ul>
        </div>
    </nav>
    <div id="depart">
        <div style="width:35%;">
            <ul class="deul">
                <li><a onclick="myFunction()" class="dea" href="">Cardiology</a></li>
                <li><a id="Pulmonology" class="dea" href="">Pulmonology</a></li>
                <li><a class="dea" href="">Gynecology</a></li>
                <li><a class="dea" href="">Neurology</a></li>
                <li><a class="dea" href="">Urology</a></li>
                <li><a class="dea" href="">Gastrology</a></li>
                <li><a class="dea" href="">Pediatricalan</a></li>
                <li><a class="dea" href="">Laborotary</a></li>
            </ul>
        </div>
        <hr>
        <div class="depart">
            <p>how are you </p>
            <img id="ww" src="" alt="">
        </div>
    </div>
    <script src="department.js"></script>
</body>
<footer>
    <div>
        <div id="fdiv">
            <a id="fa" href="index.php">~Home</a><br><br>
            <a id="fa" href="bookapp.html">~Book Appointment</a><br><br>
            <a id="fa" href="about_us.html">~About Us</a><br><br>
        
            <a id="fa" href="#"><img id="fimg" src="fb.png"></a><br><br>
            <a id="fa" href="#"><img id="fimg" src="finsta.jpg"></a><br><br>
            <a id="fa" href="#"><img id="fimg" src="ftwit.jpg"></a>
        </div>
    </div>
</footer>
</html>