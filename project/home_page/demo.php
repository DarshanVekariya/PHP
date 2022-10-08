<?php
 include "C:/xampp/htdocs/project/db_connection/_dbconnection.php";
$sql = "SELECT * FROM `doctor_registre` WHERE department_id='0'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
$str = "";
// echo "<option>".$num."</option>";
    while($row=mysqli_fetch_assoc($result))
    {
        $str .= "<option value='{$row['f_name']}'>{$row['f_name']}</option>";
    }
echo $str;    
 ?>