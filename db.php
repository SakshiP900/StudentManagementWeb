<?php
$host = "mydb.cbcqc2iu6rid.ap-south-1.rds.amazonaws.com";
$user = "admin";
$password = "admin123";
$dbname = "mywebsite";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

