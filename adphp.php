<?php 
error_reporting(E_ALL); ini_set('display_errors', 1);
include("dbconnection.php");
$msg1=$msg2=$msg3=$msg4="";
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST["newt"])) {
$titlet=test_input($_POST['titlet']);
$content=test_input($_POST['content']);
$tdate=test_input($_POST['tdate']);
$ret=mysqli_query($conn,"SELECT AUTO_INCREMENT as next FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME   = 'timeline'");
$num=mysqli_fetch_assoc($ret);
$newname=$num['next'];
$target_dir = "assets/img/";
$temp = explode(".", $_FILES["filet"]["name"]);
$newfilename = (string)$newname . '.' . end($temp);
$target_file = $target_dir .$newfilename;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
    $check = getimagesize($_FILES["filet"]["tmp_name"]);
    if($check !== false) {
        $msg1= "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $msg1= "File is not an image.";
        $uploadOk = 0;
    }
	if ($_FILES["filet"]["size"] > 1000000) {
    $msg1= "Sorry, image size should be less than 1MB.";
    $uploadOk = 0;
	}
	if($imageFileType != "jpg") {
		$msg1= "Sorry, only JPG files are allowed.";
		$uploadOk = 0;
	}
	if ($uploadOk == 1) {
		if (move_uploaded_file($_FILES["filet"]["tmp_name"], $target_file)) {
			 $sql=mysqli_query($conn,"INSERT into timeline (title,content,tdate) values ('".$titlet."','".$content."','".$tdate."')");
			$msg1="Successfully added to timeline!!";
			
		} else {
			$msg1= "Sorry, there was an error uploading your file.";
		}
	}
	
}


if(isset($_POST['tdelete']))
{
$tid=test_input($_POST['tid']);
$ret=mysqli_query($conn,"DELETE FROM timeline WHERE tid=".$tid);
$myFile = "assets/img/".$tid.".jpg";
unlink($myFile) or die("Couldn't delete file");
$msg2= "Susccessfully deleted"; 
}


if(isset($_POST["newg"])) {
$titleg=test_input($_POST['titleg']);
$gdate=test_input($_POST['gdate']);
$ret=mysqli_query($conn,"SELECT AUTO_INCREMENT as next FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME   = 'gallery'");
$num=mysqli_fetch_assoc($ret);
$newname=$num['next'];
$target_dir = "assets/img/";
$temp = explode(".", $_FILES["fileg"]["name"]);
$newfilename = (string)$newname . '.' . end($temp);
$target_file = $target_dir .$newfilename;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
    $check = getimagesize($_FILES["fileg"]["tmp_name"]);
    if($check !== false) {
        $msg3= "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $msg3= "File is not an image.";
        $uploadOk = 0;
    }
	if ($_FILES["fileg"]["size"] > 1000000) {
    $msg3= "Sorry, Image size should be less than 1 MB.";
    $uploadOk = 0;
	}
	if($imageFileType != "jpg") {
		$msg3= "Sorry, only JPG files are allowed.";
		$uploadOk = 0;
	}
	if ($uploadOk == 1) {
		if (move_uploaded_file($_FILES["fileg"]["tmp_name"], $target_file)) {
			 $sql=mysqli_query($conn,"INSERT into gallery (title,gdate) values ('".$titleg."','".$gdate."')");
			$msg3="Successfully added to timeline!!";
			
		} else {
			$msg3= "Sorry, there was an error uploading your file.";
		}
	}
	
}


if(isset($_POST['gdelete']))
{
$gid=test_input($_POST['gid']);
$ret=mysqli_query($conn,"DELETE FROM gallery WHERE gid=".$gid);
$myFile = "assets/img/".$gid.".jpg";
unlink($myFile) or die("Couldn't delete file");
$msg4= "Susccessfully deleted"; 
}
?>
