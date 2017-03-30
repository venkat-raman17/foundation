<? php 

if(isset($_POST["newt"])) {
	$titlet=test_input($_POST['titlet']);
	$content=test_input($_POST['content']);
$ret=mysqli_query($conn,"SELECT MAX(tid) as mtid FROM timeline");
$num=mysqli_fetch_assoc($ret);
$newname=$num['mtid']+1;
$target_dir = "assets/img/";
$temp = explode(".", $_FILES["filet"]["name"]);
$newfilename = $newname . '.' . end($temp);
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
	if ($_FILES["fileToUpload"]["size"] > 1000000) {
    $msg1= "Sorry, your file is too large.";
    $uploadOk = 0;
	}
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
		$msg1= "Sorry, only JPG, JPEG,& PNG files are allowed.";
		$uploadOk = 0;
	}
	if ($uploadOk == 0) {
		$msg1= "Sorry, your file was not uploaded.";
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			 $sql=mysqli_query($conn,"INSERT into timeline (title,content) values ('".$titlet."','".$content."')");
			$msg1="Successfully added to timeline!!";
			
		} else {
			$msg1= "Sorry, there was an error uploading your file.";
		}
	}
	
}


?>