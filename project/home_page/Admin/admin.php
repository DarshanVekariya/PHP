<?php
session_start();
if($_SESSION['admin_name']=='')
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
    <link rel="stylesheet" href="../Doctor/style.css">
</head>

<body>
    <div class="header">
        <img class="main" src="../user/main.jpg">
    </div>
    <div class="nav1 sticky">
        <ul>
            <li><a id="nava" href="admin.php">View All Appointment</a></li>
            <li><a id="nava" href="manage_doctor.php">Manage Doctor</a></li>
            <li><a id="nava" href="manage_user.php">Manage User</a></li>
            <li><a id="nava" href="manage_depart.php">Manage Department</a></li>
            <li><a id="nava" href="feedback.php">View Feedback</a></li>
            <li style="margin-left:20%;" class="logout"><a id="nava" href="http://localhost/project/home_page/logout.php">Log out</a></li>
        </ul>
    </div>
    </br>
    </br>
    <p>Search Appointment By Doctor Name :</p>
    <form action="admin.php" method="post">
    <input type="text" style="margin-left:5%;" name="Doctorname" id="Doctorname"><button type="submit">Search</button> 
    </form>
    <table cellpadding=2 cellspacing=5 class='app_table'>
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
                Gender
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

    if(isset($_POST['Doctorname'])){
    $sql="SELECT * FROM `book_app` WHERE `doctor`='".$_POST['Doctorname']."'";
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
            <td>{$status}</td>
        </tr>";
        }
    }
    else{
    $sql="SELECT * FROM `book_app`";
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
            <td>{$status}</td>
        </tr>";
    }
}
    ?>
    </table>
</body>
</html>
    