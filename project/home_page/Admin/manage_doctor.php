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
    <p>Search Doctor By  Name :</p>
    <form action="manage_doctor.php" method="post">
    <input type="text" style="margin-left:5%;" name="Doctorname" id="Doctorname"><button type="submit">Search</button> 
    </form>
    <table cellpadding=10 cellspacing=5 class='app_table'>
        <tr>
            <th>
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
               Department
            </th>
            <th>
                Degree
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

    if(isset($_POST['Doctorname'])){
    $sql="SELECT * FROM `doctor_registre` WHERE `f_name`='".$_POST['Doctorname']."'";
    $row=mysqli_query($conn,$sql);
    $status="REJECT";
    while($result=mysqli_fetch_assoc($row)){
        if($result['status']==1){
            $status="APPROVED";
        }
        if($result['status']==0) {
            $status="REJECT"; 
        }
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
                {$result['department']}
            </td>
            <td>
                <a href='doctors_degree/{$result['degree']}' target='_blank'>click to view</a>
            </td>
            <td>
                <button id='acceptbtn' type='submit' value='{$result['d_id']}' >
                   <a href='status.php?d_id={$result["d_id"]}&status=1'> Approve</a>
                </button>
            </td>
            <td>
                <button id='cancelbtn' type='submit' value='".$result['d_id']."'>
                <a href='status.php?d_id={$result["d_id"]}&status=0'>Reject</a>
                </button>
            </td>
            <td>
                {$status}
            </td>
        </tr>";
        }
    }
    else{
    $sql="SELECT * FROM `doctor_registre`";
    $row=mysqli_query($conn,$sql);
    $status="REJECT";
    while($result=mysqli_fetch_assoc($row)){
        if($result['status']==1){
            $status="APPROVED";
        }
        if($result['status']==0) {
            $status="REJECT"; 
        }
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
                {$result['department']}
            </td>
            <td>
                <a href='doctors_degree/{$result['degree']}' target='_blank'>click to view</a>
            </td>
            <td>
                <button id='acceptbtn' type='submit' value='{$result['d_id']}' >
                   <a href='status.php?d_id={$result["d_id"]}&status=1'> Approve</a>
                </button>
            </td>
            <td>
                <button id='cancelbtn' type='submit' value='".$result['d_id']."'>
                <a href='status.php?d_id={$result["d_id"]}&status=0'>Reject</a>
                </button>
            </td>
            <td>
                {$status}
            </td>
        </tr>";
    }
}
    ?>
    </table>
</body>
</html>
    