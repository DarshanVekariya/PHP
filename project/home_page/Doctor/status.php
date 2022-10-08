<?php
$id=$_GET['app_id'];
$status=$_GET['status'];

include "C:/xampp/htdocs/project/db_connection/_dbconnection.php";
$sql="UPDATE `book_app` SET `status` = '$status' WHERE `app_id` = '".$id."'";
$result=mysqli_query($conn,$sql);

header("location:http://localhost/project/home_page/Doctor/d_index.php ");


?>