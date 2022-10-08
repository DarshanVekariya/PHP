<?php
session_start();
if($_SESSION['user_username']=='')
{
    header("location:http://localhost/project/home_page/login.php ");
    exit;
}
?>
<?php 
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        include "C:/xampp/htdocs/project/db_connection/_dbconnection.php";
        $name=$_POST['name'];
        $email=$_POST['email'];
        $message=$_POST['message'];

        if($name!='' && $email!='' && $message!='')
        {
            $sql = "INSERT INTO `feedback` ( `name`, `email`, `message`) VALUES ('$name', '$email', '$message');";
            $Result = mysqli_query($conn,$sql);

            if($Result)
            {
                echo '<script>alert("Your Feedback submited successfully")</script>;';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <div class="header">
        <img class="main" src="main.jpg" usemap="#home">
        <map name="home">
            <area shape="rect" coords="1,2,248,235" href="index.php">
        </map>

    </div>
    <nav class="nav1">
        <div>
            <ul>
                <li><a id="nava" href="index.php">Home</a></li>
                <li><a id="nava" href="bookapp.php">Book Appointment</a></li>
                <li><a id="nava" href="about_us.html">About Us</a></li>
                <li><a id="nava" href="department.php">Department</a></li>
                <li><a id="nava" href="feedback.html">Feedback</a></li>
            </ul>
        </div>
    </nav>
    <div>
        <form class="form1" action="feedback.php" method="post">
            <table cellpadding="10px" style="margin-left: 23%;">
                <tr>
                    <td>
                        <label for="name">Name</label>
                    </td>
                    <td>
                        <input type="text" name="name" id="name">
                    </td>
                    <td>
                        <label for="email">E-mail :</label>
                    </td>
                    <td>
                        <input type="text" name="email" id="email">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="message">Message :</label>
                    </td>
                    <td colspan="3">
                        <textarea name="message" id="message" cols="50" rows="10"></textarea>
                    </td>
                </tr>
                <tr id="buttontr">
                    <td colspan="4">
                        <button type="submit" class="button">Submit</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
<footer>
    <div>
        <div id="fdiv">
            <a id="fa" href="index.php">~Home</a><br><br>
            <a id="fa" href="bookapp.html">~Book Appointment</a><br><br>
            <a id="fa" href="about_us.html">~About Us</a><br><br>

            <a id="fa" href="#"><img id="fimg" src="fb.png"></a><br><br>
            <a id="fa" href="#"><img id="fimg" src="finsta.jpg"></a><br><br>
            <a id="fa" href="#"><img id="fimg" src="ftwit.jpg"></a>
        </div>
    </div>
</footer>

</html>