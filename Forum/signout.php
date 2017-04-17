<?php

session_start();
$k=$_SESSION['unames'];

session_unset(); 


session_destroy();
header("Location:signin.php"); 
?>