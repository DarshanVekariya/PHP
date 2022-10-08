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
    <p>Search user By  Name :</p>
    <form action="manage_user.php" method="post">
    <input type="text" style="margin-left:5%;" name="username" id="username"><button type="submit">Search</button> 
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
                Mobile No.
            </th>
            <th>
                Delete User
            </th>
        </tr>
    <?php
    include "C:/xampp/htdocs/project/db_connection/_dbconnection.php";

    if(isset($_POST['username'])){
    $sql="SELECT * FROM `user_registre` WHERE `f_name`='".$_POST['username']."'";
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
                {$result['e_mail']}
            </td>
            <td>
                {$result['mobile']}
            </td>
            <td>
                <button id='cancelbtn' type='submit' value='".$result['p_id']."'>
                <a href='delete_user.php?p_id={$result["p_id"]}'>Delete</a>
                </button>
            </td>
        </tr>";
        }
    }    
    else{
    $sql="SELECT * FROM `user_registre`";
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
                {$result['e_mail']}
            </td>
            <td>
                {$result['mobile']}
            </td>
            <td>
                <button id='cancelbtn' type='submit' value='".$result['p_id']."'>
                <a href='delete_user.php?p_id={$result["p_id"]}'>Delete<?a>
                </button>
            </td>
        </tr>";
    }
}

    ?>
    </table>
</body>
</html>
    