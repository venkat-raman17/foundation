<?php 
    require_once("dbconnection.php");  
    if($_GET['mid']!=""){
        $resss=mysqli_query($conn,"update member set vote=1 where mid = ".$_GET['mid']);
        $res=mysqli_query($conn,"select COUNT(vote) as votes from member where vote=1");
        $num=mysqli_fetch_assoc($res);
        echo $num['votes'];
    }
?>
