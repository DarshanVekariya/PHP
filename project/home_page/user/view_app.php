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
    <table border=1 cellpadding=2 cellspacing=5 class='app_table'>
        <tr>
            <th>
                Frist Name
            </th>
            <th>
                Last Name
            </th>
            <th>
                Date of Birth
            </th>
            <th>
                GEnder
            </th>
            <th>
                E-mail
            </th>
            <th>
                Phone No.
            </th>
            <th>
                Department
            </th>
            <th>
                Booking Date
            </th>
            <th>
                Doctor
            </th>
            <th>
                Description
            </th>
            <th>
                Status
            </th>
        </tr>
    <?php
    include "C:/xampp/htdocs/project/db_connection/_dbconnection.php";
    $sql="SELECT * FROM `book_app` WHERE doctor='{$_SESSION['user_username']}'";
    $row=mysqli_query($conn,$sql);
    $status="CANCELED";
    while($result=mysqli_fetch_assoc($row)){
        if($result['status']==1){
            $status="ACCEPTED";
        }
        if($result['status']==0) {
            $status="CANCELED"; 
        }
    echo"    
    
        <tr>
            <td>
                {$result['f_name']}
            </td>
            <td>
                {$result['l_name']}
            </td>
            <td>
                {$result['dob']}
            </td>
            <td>
                {$result['gender']}
            </td>
            <td>
                {$result['email']}
            </td>
            <td>
                {$result['phone']}
            </td>
            <td>
                {$result['department']}
            </td>
            <td>
                {$result['book_date']}
            </td>
            <td>
                {$result['doctor']}
            </td>
            <td>
                <textarea name='' id='' cols='20' rows='5'>
                '".$result['description']."'
                </textarea>
            </td>
            <td>
                <p id='status'>{$status}</p>
            </td>
        </tr>";
    }
    ?>
    </table>
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