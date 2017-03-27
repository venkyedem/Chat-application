<?php
session_start();
$f=$_GET['phone'];
echo $f;
$_SESSION['to']=$f;
header("Location:main.php");
?>