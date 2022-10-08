<?php
include "C:/xampp/htdocs/project/db_connection/_dbconnection.php";

$pid=$_GET['p_id'];
$sql="DELETE FROM user_registre WHERE p_id='".$pid."'";
$result=mysqli_query($conn,$sql);

header("location:manage_user.php");
?>