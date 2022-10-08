<?php
$d_id=$_GET['d_id'];
$status=$_GET['status'];

include "C:/xampp/htdocs/project/db_connection/_dbconnection.php";
$sql="UPDATE `doctor_registre` SET `status` = '$status' WHERE `d_id` = '".$d_id."'";
$result=mysqli_query($conn,$sql);

header("location:http://localhost/project/home_page/Admin/manage_doctor.php");


?>