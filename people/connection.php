<?php
$databaseHost = 'localhost';
$databaseName = 'php_crud';
$databaseUsername = 'root';
$databasePassword = 'root';

$connection = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
// Check connection
if (!$connection) {
    die("Unable to Connect database: " . mysqli_connect_error());
}
?>