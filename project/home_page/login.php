<?php
// $num = "";
$log=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include "C:/xampp/htdocs/project/db_connection/_dbconnection.php";
    $username = $_POST["username"];
    $password = $_POST["password"];
    if($username!="" && $password!="")
    {
    $sqli="SELECT * FROM `user_registre`";
    $resulti=mysqli_query($conn,$sqli);
    while($rowi=mysqli_fetch_assoc($resulti)){
    if($rowi['user_name']==$username && $rowi['pass']==$password){

    $sql = 'SELECT * FROM `user_registre` WHERE user_name="'.$username.'" AND pass="'.$password.'"';
    // $sql = "SELECT * FROM `user_registre` WHERE pass='$password'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num>0){
        $log=true;
        session_start();
        $_SESSION['user_username']=$username;
        $_SESSION['password']=$password;
        header("location:http://localhost/project/home_page/user/index.php ");
        exit;

    }
    }
    }

    $sqld="SELECT * FROM `doctor_registre`";
    $resultd=mysqli_query($conn,$sqld);
    while($rowd=mysqli_fetch_assoc($resultd)){
    if($rowd['user_name']==$username && $rowd['pass']==$password){

    $dsql = 'SELECT * FROM `doctor_registre` WHERE user_name="'.$username.'" AND pass="'.$password.'"';
    $dresult = mysqli_query($conn,$dsql);
    $dnum = mysqli_num_rows($dresult);
    if($dnum>0){
        $log=true;
        session_start();
        $_SESSION['doctor_username']=$username;
        $_SESSION['password']=$password;
        header("location:http://localhost/project/home_page/Doctor/d_index.php ");
        exit;
    }
    }
    }

    $sqla="SELECT * FROM `admin`";
    $resulta=mysqli_query($conn,$sqla);
    while($rowa=mysqli_fetch_assoc($resulta)){
    if($rowa['user_name']==$username && $rowa['pass']==$password){
        $asql="SELECT * FROM `admin` WHERE user_name='".$username."' AND pass='".$password."'";
        $aresult=mysqli_query($conn,$asql);
        $anum=mysqli_num_rows($aresult);
        if($anum>0){
            session_start();
            $_SESSION['admin_name']=$username;
            header("location:Admin/admin.php");
            exit;
        }
    }
    }


}

    else{echo'<script> alert("Please enter ture password and username");</script>';}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div>
        <?php
        if($log == true){
            echo "Loging";
        }

        ?>
    </div>
    <div>
        <h1 class="header">Login</h1>
        <form class="form1" action="login.php" method="POST">
            <div>
                <label for="username">User Name:</label><br><br>
                <input type="text" id="username" name="username"><br><br>
            </div>
            <div>

                <label for="password">Password:</label><br><br>
                <input type="text" id="password" name="password"><br><br>
            </div>
            <div>
                <button type="submit">Login</button><br><br>

            </div>
            <label for="">For User: </label>
            <a href="user_register.php">Don't have account?</a><br><br>
            <label for="">For Doctor: </label>
            <a href="doctor_register.php">Don't have account?</a>
        </form>
    </div>
</body>
</html>