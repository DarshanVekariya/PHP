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
    $mobile = $_POST["mobile"];
    $user_name = $_POST["username"];
    $pass = $_POST["password"];
    $cpass = $_POST["cpassword"];

    $sql="SELECT * FROM `user_registre`";
    $resulti=mysqli_query($conn,$sql);
    while($rowi=mysqli_fetch_assoc($resulti)){
    if($rowi['user_name']==$_POST["username"]){
        echo "<script>alert('user name is existe type different');</script>";
    }
    }

    if($pass == $cpass && $user_name!="" && $pass!=""&&$f_name!=""&&$m_name!=""&&$l_name!=""&&$dob!=""&&$gender!=""&&$email!=""&&$mobile!="")
    {
        $sql = "INSERT INTO `user_registre` (`f_name`, `m_name`, `l_name`, `dob`, `gender`, `e_mail`, `mobile`, `user_name`, `pass`) VALUES ('$f_name', '$m_name', '$l_name', '$dob', '$gender', '$email', '$mobile', '$user_name', '$pass');";
        $Res = mysqli_query($conn,$sql);
        $sinup=true;
        session_start();
        if ($_SESSION['username']=='') {
            header("location:login.php");
            exit;
        }
    }
    else{
        $same_pass = true;
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user register</title>
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
        <h1 class="header">User Registretion</h1>
        <form class="form1" method="POST" action="user_register.php">
            <table cellspacing="10" cellpadding="10">
                <tr>
                    <td>
                        <label for="fristname">Frist Name :</label><lable class="red"> *</lable><br><br>
                        <input type="text" id="fristname" name="fristname"><br><br>
                    </td>
                    <td>

                        <label for="middlename">Middle Name:</label><lable class="red"> *</lable><br><br>
                        <input type="text" id="middlename" name="middlename"><br><br>

                    </td>
                    <td>
                        <label for="lastname">Last Name:</label><lable class="red"> *</lable><br><br>
                        <input type="text" id="lastname" name="lastname"><br><br>
                    </td>

                </tr>
                <tr>

                    <td>
                        <label for="dob">Date of Birth(yyyy/mm/dd):</label><lable class="red"> *</lable><br><br>
                        <input type="text" id="dob" name="dob"><br><br>

                    </td>
                    <td>
                        <label for="gender">Gender:</label><lable class="red"> *</lable><br><br>
                        <input type="text" id="gender" name="gender"><br><br>
                    </td>
                    <td>
                        <label for="email">E-mail:</label><lable class="red"> *</lable><br><br>
                        <input type="text" id="email" name="email"><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="mobile">Mobile No. :</label><lable class="red"> *</lable><br><br>
                        <input type="text" id="mobile" name="mobile"><br><br>
                    </td>
                    <td>
                        <label for="username">User Name. :</label><lable class="red"> *</lable><br><br>
                        <input type="text" id="username" name="username"><br><br>
                    </td>
                    <td>
                        <label for="password">Password. :</label><lable class="red"> *</lable><br><br>
                        <input type="text" id="password" name="password"><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="cpassword">Confirm Password. :</label><lable class="red"> *</lable><br><br>
                        <input type="text" id="cpassword" name="cpassword"><br><br>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center;">
                        <button type="submit" class="btn">register</button><br><br>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>