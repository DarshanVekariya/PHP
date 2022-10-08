<?php
session_start();
if($_SESSION['user_username']=='')
{
    header("location:http://localhost/project/home_page/login.php ");
    exit;
}

?>

<?php
$book=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include "C:/xampp/htdocs/project/db_connection/_dbconnection.php";
    $f_name = $_POST["fname"];
    $l_name = $_POST["lname"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $department = $_POST["department"];
    $appdate = $_POST["appdate"];
    $doctor = $_POST["doctor"];
    $description=$_POST["description"];
    $dsql = "SELECT department_name FROM `department_id` WHERE d_id='$department';";
    $row=mysqli_query($conn,$dsql);
    $result=mysqli_fetch_assoc($row);
    $department_name = $result['department_name'];

    if($f_name!="" && $l_name!="" && $dob!="" && $gender!=""&&$email!=""&&$phone!=""&&$department_name!=""&&$appdate!=""&&$doctor!=""&&$description!="")
    {
        $sql = "INSERT INTO `book_app` (`f_name`, `l_name`, `dob`, `gender`, `email`, `phone`, `department`, `book_date`, `doctor`, `description`) VALUES ('$f_name', '$l_name', '$dob', '$gender', '$email', '$phone', '$department_name', '$appdate', '$doctor', '$description');";
        $Res = mysqli_query($conn,$sql);
        $book=true;
      
    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Health</title>
    <link rel="stylesheet" href="index.css">
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#department").change(function(){
                var id=$(this).val() ;
                $.ajax({
                    url:"doctor_name.php",
                    type:"POST", 
                    data:{doctorID:id},
                    success:function(data){
                        $("#doctor").html(data);
                    }
                });
            });
        });
    </script>
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
                <li><a id="nava" href="feedback.php">Feedback</a></li>
            </ul>
        </div>
    </nav>
    <?php
        if($book==true){
            echo "booking successful";
        }
        else{
            echo "not booking";
        }
    ?>
    <div>
        <form class="form1" method="POST" action="">
            <table cellspacing="10" cellpadding="10">
                <tr>
                    <td id="td1">
                        <label for="fname">Frist Name</label>
                    </td>
                    <td id="2td">
                        <input type="text" id="fname" name="fname">
                    </td>
                    <td id="3td">
                        <label for="lname">Last Name</label>
                    </td>
                    <td id="4td">
                        <input type="text" id="lname" name="lname">
                    </td>
                    <td id="5td">
                        <label for="dob">Date of Birth</label>
                    </td>
                    <td id="6td">
                        <input type="text" id="dob" name="dob">
                    </td>
                </tr>
                <tr>
                    <td id="td1">
                        <label for="gender">Gender</label>
                    </td>
                    <td id="2td">
                        <input type="text" id="gender" name="gender">
                    </td>
                    <td id="3td">
                        <label for="email">E-mail</label>
                    </td>
                    <td id="4td">
                        <input type="text" id="email" name="email">
                    </td>
                    <td id="5td">
                        <label for="phone">Phone No.</label>
                    </td>
                    <td id="6td">
                        <input type="number" id="phone" name="phone">
                    </td>
                </tr>
                <tr>
                    <td id="td1">
                        <label for="department">Department</label>
                    </td>
                    <td id="2td">
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
                    <td id="3td">
                        <label for="appdate">Appointment Booking Date:</label>
                    </td>
                    <td id="4td">
                        <input type="text" id="appdate" name="appdate">
                    </td>
                    <td id="5td">
                        <label for="doctor">Doctor</label>
                    </td>
                    <td id="6td">
                    <select name="doctor" id="doctor">
                        <option value="" disabled selected>Select Doctor</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td id="1td">
                        <label for="description">Description</label>
                    </td>
                    <td colspan="3">
                        <textarea name="description" id="description" cols="56" rows="5"></textarea>
                    </td>
                </tr>
                <tr id="buttontr">
                    <td colspan="6">
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