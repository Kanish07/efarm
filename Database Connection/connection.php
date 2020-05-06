<?php
session_start();
/* Database connection start */
//Configure according to your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mini_project";
 
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
 
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
 
?>