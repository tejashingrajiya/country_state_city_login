<?php
$dbserver = "localhost";
$dbuser = "root";
$dbpassword = "root";
$dbname = "php_crud";
 
 $conn=mysqli_connect($dbserver,$dbuser,$dbpassword,$dbname)
  or die("error in $conn" . mysqli_connect_error());
?>
