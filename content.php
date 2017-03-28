<?php
session_start();
include("dbconnection.php");
$mid= "0";


if (!isset($_SESSION['login']))
{
    $logged='no';
}
else{
    $logged='yes';
    $mid= $_SESSION['login'];
}



$msg1= $msg2 =$msg3 = "";
$mphone = $phone = $mcode = $mname = $place = "";
$logdisp = 'none';
$rdisp = 'block';
$ldisp = 'none';
$fmcode= 'none';

if(isset($_POST['login']))
{
$phone=test_input($_POST['phone']);
$mcode=test_input($_POST['mcode']);
$ret=mysqli_query($conn,"SELECT * FROM member WHERE phone='".$phone."'");
$num=mysqli_fetch_assoc($ret);
if($num>0)
{
 if($num['mcode']==$mcode){
	$extra="index.php";
        $mid=$num['mid'];
        $_SESSION['mname']=$mname=$num['mname'];
        $_SESSION['phone']=$phone=$num['phone'];
        $_SESSION['place']=$place=$num['place'];
	$_SESSION['login']=$mid;
	echo "<script>window.location.href='".$extra."'</script>";
	exit();
     }
 else{
      	$msg2="Wrong member code!!";
        $logdisp='block';
        $rdisp='none';
        $ldisp='block';
		$fmcode= 'none';
  }
}
else
{
$msg1="Your mobile is not registered!! Please register!!";
$fmcode = 'none';
$logdisp = 'block';
$rdisp='block';
$ldisp="none";
}
}



if(isset($_POST['fmcode']))
{
$mphone=test_input($_POST['mphone']);
$reta=mysqli_query($conn,"SELECT * FROM member WHERE phone='".$mphone."'");
$numa=mysqli_fetch_assoc($reta);
if($numa>0)
{
 	$digits = 5;
	$mcode = 0;
	while($mcode == 0){
		$mcode = rand(pow(10, $digits-1), pow(10, $digits)-1);
		$retq=mysqli_query($conn,"SELECT * FROM member WHERE mcode=".$mcode);
		$numq=mysqli_fetch_assoc($retq);
		if($numq>0){
			$mcode=0;
		}
	}
	    $authKey = "114509ADXELCMklvhG574cfd32";
		$mobileNumber = $mphone;
		$senderId = "JBMEMC";
		$message = urlencode("You have requested for new member code. Your new member code is ".$mcode.".");
		$route = "Transactional Route";
		$postData = array(
		    'authkey' => $authKey,
		    'mobiles' => $mobileNumber,
		    'message' => $message,
		    'sender' => $senderId,
		    'route' => $route
		);
		$url="https://control.msg91.com/api/sendhttp.php";
		$ch = curl_init();
		curl_setopt_array($ch, array(
		    CURLOPT_URL => $url,
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_POST => true,
		    CURLOPT_POSTFIELDS => $postData
		));

		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		curl_exec($ch);
		if(curl_errno($ch))
		{
		 $msg3="Enter a valid mobile number!!";
		 $logdisp='none';
		 $rdisp='none';
		 $ldisp='none';
		 $fmcode='block';
		}
		else{   
			 $sql=mysqli_query($conn,"update member set mcode=".$mcode." where phone = '".$mphone."'");
			 $msg2="New member code is sent to your mobile!!";
			 $logdisp='block';
			 $rdisp='none';
			 $ldisp='block';
			 $fmcode='none';
	}
}
else
{
$msg3="Entered mobile is not registered!!";
$logdisp='none';
$fmcode = 'block';
}
}



if(isset($_POST['register']))
{
$phone=test_input($_POST['phone']);
$mname=test_input($_POST['mname']);
$place=test_input($_POST['place']);
$ret=mysqli_query($conn,"SELECT * FROM member WHERE phone='".$phone."'");
$num=mysqli_fetch_assoc($ret);
if($num==0)
{
$digits = 5;
$mcode = 0;
while($mcode == 0){
	$mcode = rand(pow(10, $digits-1), pow(10, $digits)-1);
	$retq=mysqli_query($conn,"SELECT * FROM member WHERE mcode=".$mcode);
	$numq=mysqli_fetch_assoc($retq);
	if($numq>0){
		$mcode=0;
	}
}

$authKey = "114509ADXELCMklvhG574cfd32";
$mobileNumber = $phone;
$senderId = "JBMEMC";
$message = urlencode("Thanks for joining as a member. Your member code is ".$mcode.".");
$route = "Transactional Route";
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,
    'route' => $route
);
$url="https://control.msg91.com/api/sendhttp.php";
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
));

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

curl_exec($ch);
if(curl_errno($ch))
{
 $msg1=curl_error($ch);
 $logdisp='block';
 $rdisp='block';
 $ldisp='none';
}
else{ 
 $sql=mysqli_query($conn,"INSERT into member (mname,phone,place,mcode) values ('".$mname."','".$phone."','".$place."',".$mcode.")");
 $msg2="Successfully registered!! Login using member code sent to your mobile!!";
 $logdisp='block';
 $rdisp='none';
 $ldisp='block';
}
curl_close($ch);
}
else
{
$msg2="Your mobile is already registered!! Please login!!";
 $logdisp='block';
 $rdisp='none';
 $ldisp='block';
}
}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>