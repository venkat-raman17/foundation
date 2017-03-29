<?php
$username = "root";
$password = "cacti";
$servername = "localhost";
$dbname = "foundation";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_query ($conn,"set character_set_results='utf8'");
?>

