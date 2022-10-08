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
    <form action="add_del_depart.php" method="POST" class='app_table'>
        <h2>Add Department</h2>
        <input type="text" name="adddepart" id="adddepart"><button type="submit">Add</button>
    </form>

    <table cellpadding=10 cellspacing=5 class='app_table'>
        <tr>
            <th>
                Department Name
            </th>
            <th>
                Action
            </th>
        </tr>
        <?php
        include "C:/xampp/htdocs/project/db_connection/_dbconnection.php";

        $sql="SELECT * FROM `department_id`";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            echo"
            <tr>
                <td>{$row['department_name']}</td>
                <td>
                <button id='cancelbtn' type='submit' value='".$row['department_name']."'>
                <a href='add_del_depart.php?d_name={$row["department_name"]}'>Delete</a>
                </button>
                </td>
            </tr>
            ";

        }
        ?>
    </table>
</body>
</html>    