<?php 
    require_once("dbconnection.php");  
    if($_GET['mid']!="" && $_GET['imageid']!=""){
        $no=mysqli_fetch_assoc(mysqli_query($conn,"select * from memdetails where mid=".$_GET['mid']." and mlike=".$_GET["imageid"]));
        if($no>0){
            mysqli_query($conn,"delete from memdetails where mid=".$_GET['mid']." and mlike=".$_GET["imageid"]);
        }
        else{
            mysqli_query($conn,"insert into memdetails values(".$_GET['mid'].",".$_GET["imageid"].")");
        }
        $likes=mysqli_query($conn,"select COUNT(*) as likes from memdetails where mlike=".$_GET["imageid"]);
        $num=mysqli_fetch_assoc($likes);
        echo $num['likes'];
    }
?>
