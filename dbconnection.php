<?php
$username = "root";
$password = "root@123";
$servername = "localhost";
$dbname = "foundation";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

