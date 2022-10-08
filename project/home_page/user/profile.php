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
    <title>E-Health</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="profile.css">
</head>

<body>
    <div class="header">
        <img class="main" src="main.jpg">
        <button class="btn">
        <a id="nava" href="profile.php"><?php 
                 echo $_SESSION['user_username'];
            ?></a>
        </button>
        <button class="btn2">
        <a id="nava" href="view_app.php">View Appointment</a>
        </button> 
    </div>
    <div class="nav1 sticky">
        <ul>
            <li><a id="nava" href="index.php">Home</a></li>
            <li><a id="nava" href="bookapp.php">Book Appointment</a></li>
            <li><a id="nava" href="about_us.html">About Us</a></li>
            <li><a id="nava" href="department.php">Department</a></li>
            <li><a id="nava" href="feedback.php">Feedback</a></li>
            <li style="margin-left:45%;" class="logout"><a id="nava" href="http://localhost/project/home_page/logout.php">Log out</a></li>
        </ul>
    </div>
    <?php
    include "C:/xampp/htdocs/project/db_connection/_dbconnection.php";
    $sql="SELECT * FROM `user_registre` WHERE user_name='".$_SESSION['user_username']."'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    // if($row){echo "hello";}
    echo '
    <div id="pdiv" class="div1">
        <p> Frist Name : '.$row["f_name"].'</p>
    </div>
    <div id="pdiv" class="div2">
        <p> Middle Name : '.$row['m_name'].' </p>
    </div>
    <div id="pdiv" class="div3">
        <p> Last Name : '.$row['l_name'].' </p>
    </div>
    <div id="pdiv" class="div4">
        <p> Date of Birth : '.$row['dob'].' </p>
    </div>
    <div id="pdiv" class="div5">
        <p> Gender : '.$row['gender'].' </p>
    </div>
    <div id="pdiv" class="div6">
        <p> E-mail : '.$row['e_mail'].' </p>
    </div>
    <div id="pdiv" class="div7">
        <p> Phone No. : '.$row['mobile'].' </p>
    </div>';
    ?>
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