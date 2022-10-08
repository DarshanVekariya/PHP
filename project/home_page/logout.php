<?php  

 session_start();
 session_unset();
 session_destroy();

 header("location:http://localhost/project/home_page/login.php ")

?>