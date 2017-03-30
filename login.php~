<?php
session_start();
include("dbconnection.php");
$msg="";
$username = $password = "";
if(isset($_POST['alogin']))
{
$username=test_input($_POST['username']);
$password=test_input($_POST['password']);
$ret=mysqli_query($conn,"SELECT * FROM admin WHERE username='".$username."'");
$num=mysqli_fetch_assoc($ret);
if($num>0)
{
 if($num['password']==$password){
	$extra="admin.php";
	$_SESSION['admin']=$username;
	echo "<script>window.location.href='".$extra."'</script>";
	exit();
     }
 else{
      	$msg="Wrong password!!";
  }
}
else
{
$msg="Invalid username!!";
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>S.R. Jawahar Babu | Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
	font-family: "Roboto", sans-serif
}
.w3-sidenav a {
	padding: 16px;
	font-weight: bold
}
</style>
  </head>

  <body>
      
	  	
		     	  	
	  	
<div class="w3-container w3-padding-32" style="padding-left: 10px">
                 
                            <div class="w3-card-4 centered">

                            <div class="w3-container w3-grey">
                              <h3>Admin Login</h3>
                            </div>
				
                            <form class="w3-container w3-padding-16"  name="form1" method="post" action="">
                            	
                                <p><label class="w3-label" >Username</label>
                                    <input class="w3-input" type="text" name="username" value="" maxlength="15" required></p>

                                <p><label class="w3-label">Password</label>
                                    <input class="w3-input" type="password" name="password" value="" maxlength="15" required></p>
                           
                                
                                <div align="center" class="w3-padding-top"><input type="submit" name="alogin" value="Login" class="w3-padding-top w3-button w3-grey">
                                    </div>
				<p class="w3-center"><?php echo $msg;?></p>
                            </form>

                            </div>
                    </div>
		

	</div>


  </body>
</html>
