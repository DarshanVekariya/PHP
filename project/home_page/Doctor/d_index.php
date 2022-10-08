<?php
session_start();
if($_SESSION['doctor_username']=='')
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
    <link rel="stylesheet" href="../user/index.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="header">
        <img class="main" src="../user/main.jpg">
    </div>
    <div class="nav1 sticky">
        <ul>
            <li><a id="nava" href="d_index.php">Manage Appointment</a></li>
            <li><a id="nava" href="profile.php">View Profile</a></li>
            <!-- <li><a id="nava" href="#">About Us</a></li> -->
            <li style="margin-left:57%;" class="logout"><a id="nava" href="http://localhost/project/home_page/logout.php">Log out</a></li>
            <li style="color:white;"><?php 
                 echo $_SESSION['doctor_username'];
            ?></li>
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
                Accept
            </th>
            <th>
                Cancel
            </th>
            <th>
                Status
            </th>
        </tr>
    <?php
    include "C:/xampp/htdocs/project/db_connection/_dbconnection.php";
    $sql="SELECT * FROM `book_app` WHERE doctor='{$_SESSION['doctor_username']}'";
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
                <button id='acceptbtn' type='submit' value='{$result['app_id']}' >
                   <a href='status.php?app_id={$result["app_id"]}&status=1'> Accept</a>
                </button>
            </td>
            <td>
                <button id='cancelbtn' type='submit' value='".$result['app_id']."'>
                <a href='status.php?app_id={$result["app_id"]}&status=0'>Cancel<?a>
                </button>
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
            <a id="fa" href="">~Manage Appointment</a><br><br>
            <a id="fa" href="">~View Profile </a><br><br>
        
            <a id="fa" href="#"><img id="fimg" src="../user/fb.png"></a><br><br>
            <a id="fa" href="#"><img id="fimg" src="../user/finsta.jpg"></a><br><br>
            <a id="fa" href="#"><img id="fimg" src="../user/ftwit.jpg"></a>
        </div>
    </div>
</footer>
</html>