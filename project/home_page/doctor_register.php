<?php
$sinup = false;
$same_pass=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include "C:/xampp/htdocs/project/db_connection/_dbconnection.php";
    $f_name = $_POST["fristname"];
    $m_name = $_POST["middlename"];
    $l_name = $_POST["lastname"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $city = $_POST["city"];
    $user_name = $_POST["username"];
    $department=$_POST["department"];
    $pass = $_POST["password"];
    $cpass = $_POST["cpassword"];
    $degree=$_FILES["files"]["name"];
    $dsql = "SELECT d_id FROM `department_id` WHERE department_name='$department';";
    $row=mysqli_query($conn,$dsql);
    $result=mysqli_fetch_assoc($row);
    $department_id = $result['d_id'];
    // $degree_tmp=$_FILES["degree"]["tmp_name"];
    // move_uploaded_file($degree_tmp,"Admin/doctors_degree/".$degree);

    $sql="SELECT * FROM `doctor_registre`";
    $resulti=mysqli_query($conn,$sql);
    while($rowi=mysqli_fetch_assoc($resulti)){
    if($rowi['user_name']==$_POST["username"]){
        echo "<script>alert('user name is existe type different');</script>";
    }
    elseif($rowi['degree']==$_FILES["files"]["name"]){
        echo "<script>alert('Not allow -- please rename your pdf name');</script>";
    }
    }
    if($pass == $cpass && $user_name!="" && $pass!=""&&$f_name!=""&&$m_name!=""&&$l_name!=""&&$dob!=""&&$gender!=""&&$email!=""&&$phone!=""&&$degree!="")
    {
        $sql = "INSERT INTO `doctor_registre` (`f_name`, `m_name`, `l_name`, `dob`, `gender`, `email`, `phone`,`regi_time`, `city`, `user_name`, `pass`,`degree`,`department`,`department_id`) VALUES ('$f_name', '$m_name', '$l_name', '$dob', '$gender', '$email', '$phone', current_timestamp(), '$city', '$user_name', '$pass','$degree','$department','$department_id');";
        $Res = mysqli_query($conn,$sql);
        $sinup=true;
      
    }
    else{
        $same_pass = true;
    }   
    
}
?>


<?php 
    if(isset($_POST['btn'])){
        // var_dump($_FILES['files']);
        $file=$_FILES['files']['name'];
        $file_tmp=$_FILES['files']['tmp_name'];
         move_uploaded_file($file_tmp,"C:/xampp/htdocs/project/home_page/Admin/doctors_degree/".$file);
    } 
    // else{echo"file not not uploaded";}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor register</title>
    <link rel="stylesheet" href="register.css">
</head>

<body>
    <div>
        <?php
        if($sinup == true){
            echo "singup";
        }
        if ($same_pass == true){
            echo "somthing wrong";
        }
        ?>
    </div>
    <div>
        <h1 class="header">Doctor Registretion</h1>
        <form enctype="multipart/form-data" class="form1" method="POST" action="doctor_register.php">
            <table cellspacing="10" cellpadding="10">
                <tr>
                    <td>
                        <label for="fristname">Frist Name:</label><br><br>
                        <input type="text" id="fristname" name="fristname"><br><br>
                    </td>
                    <td>

                        <label for="middlename">Middle Name:</label><br><br>
                        <input type="text" id="middlename" name="middlename"><br><br>

                    </td>
                    <td>
                        <label for="lastname">Last Name:</label><br><br>
                        <input type="text" id="lastname" name="lastname"><br><br>
                    </td>

                </tr>
                <tr>

                    <td>
                        <label for="dob">Date of Birth:</label><br><br>
                        <input type="text" id="dob" name="dob"><br><br>

                    </td>
                    <td>
                        <label for="gender">Gender:</label><br><br>
                        <input type="text" id="gender" name="gender"><br><br>
                    </td>
                    <td>
                        <label for="email">E-mail:</label><br><br>
                        <input type="text" id="email" name="email"><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="phone">Phone No. :</label><br><br>
                        <input type="text" id="phone" name="phone"><br><br>
                    </td>
                    <td>
                        <label for="city">City. :</label><br><br>
                        <input type="text" id="city" name="city"><br><br>
                    </td>
                    <td>
                        <label for="username">User Name. :</label><br><br>
                        <input type="text" id="username" name="username"><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Password. :</label><br><br>
                        <input type="text" id="password" name="password"><br><br>
                    </td>
                    <td>
                        <label for="cpassword">Confirm Password. :</label><br><br>
                        <input type="text" id="cpassword" name="cpassword"><br><br>
                    </td>
                    <td>
                        <label for="files">Your Degree :</label><br><br>
                        <input type="file" id="files" name="files"><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="department">Your Department :</label>
                    </td>
                    <td>    
                        <select name="department" id="department">
                        <option value="" disabled selected>select department</option>
                            <?php  
                                include "C:/xampp/htdocs/project/db_connection/_dbconnection.php";

                                $sqli="SELECT * FROM `department_id`";
                                $resulti=mysqli_query($conn,$sqli);
                                while($rowi=mysqli_fetch_assoc($resulti)){
                                    echo "<option value='{$rowi['d_id']}'>{$rowi['department_name']}</option>";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center;">
                        <button type="submit" class="btn" name="btn">register</button><br><br>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>