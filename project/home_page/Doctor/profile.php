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
            <li style="margin-left:730px;" class="logout"><a id="nava" href="http://localhost/project/home_page/logout.php">Log out</a></li>
            
        </ul>
    </div>  
    <table border=1 cellpadding=5 cellspacing=10 class='app_table'>
        <tr>
            <th style>
                Frist Name
            </th>
            <th>
                Middle Name
            </th>
            <th>
                Last Name
            </th>
            <th>
                Date of Birth
            </th>
            <th>
                Gender
            </th>
            <th>
                E-mail
            </th>
            <th>
                Phone No.
            </th>
            <th>
                City
            </th>
            <th>
                User Name
            </th>
            <th>
                Department
            </th>
        </tr>
    <?php
    include "C:/xampp/htdocs/project/db_connection/_dbconnection.php";
    $sql="SELECT * FROM `doctor_registre` WHERE user_name='{$_SESSION['doctor_username']}'";
    $row=mysqli_query($conn,$sql);
    while($result=mysqli_fetch_assoc($row)){
    echo"    
    
        <tr>
            <td>
                {$result['f_name']}
            </td>
            <td>
                {$result['m_name']}
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
                {$result['city']}
            </td>
            <td>
                {$result['user_name']}
            </td>
            <td>
                {$result['department']}
            </td>
        </tr>";
    }
    ?>
    </table>
    <form action="profile.php" method="POST">
        <input type="submit" class="btn" name="delete" value="Delete Your Profile">
    </form>
    <?php
        if(isset($_POST['delete']))
        {
            include "C:/xampp/htdocs/project/db_connection/_dbconnection.php";
            $sql="DELETE FROM `doctor_registre` WHERE user_name='".$_SESSION['doctor_username']."'";
            $result=mysqli_query($conn,$sql);
            if($result){
                session_start();
                session_unset();
                session_destroy();
                header("location:http://localhost/project/home_page/login.php ");
            }
        }
    ?>
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