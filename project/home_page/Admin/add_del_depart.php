<?php
include "C:/xampp/htdocs/project/db_connection/_dbconnection.php";
if(isset($_POST['adddepart'])){
$add=$_POST['adddepart'];
if($_POST['adddepart']!=""){
$sql="INSERT INTO `department_id`(department_name) VALUES('$add')";
$result=mysqli_query($conn,$sql);
    if($result){
        header("location:manage_depart.php ");
    }
}
}
if(isset($_GET['d_name'])){
$del=$_GET['d_name'];
if($_GET['d_name']!=""){
    echo $del;
    $sql="DELETE FROM `department_id` WHERE department_name='".$del."'";
    $result=mysqli_query($conn,$sql);
        if($result){
            header("location:manage_depart.php ");
        }
}
}

if($_POST['adddepart']==""||$_GET['d_name']==""){
    header("location:manage_depart.php");
}
?>