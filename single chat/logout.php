<?php

session_start();
$k=$_SESSION['unames'];
$host = "localhost"; 
$user = "root";
 $pass = ""; 
 $db_name = "chatting";
 $con = new mysqli($host, $user, $pass, $db_name);
 $sql="UPDATE  LOGGER SET STATUS=0 WHERE UNAME='$k'";
$result=$con->query($sql);
 
session_unset(); 

// destroy the session 
session_destroy();
header("Location:index.php"); 
?>