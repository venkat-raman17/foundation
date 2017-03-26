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
$msg1= $msg2="";
$phone = $mcode = $mname = $place = "";
$logdisp = 'none';
$rdisp = 'block';
$ldisp = 'none';
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
  }
}
else
{
$msg1="Your mobile is not registered!! Please register!!";
$logdisp = 'block';
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
 $sql=mysqli_query($conn,"INSERT into member (mname,phone,place) values ('".$mname."','".$phone."','".$place."')");
 $msg2="Successfully registered!! Login using member code sent your mobile!!";
 $logdisp='block';
 $rdisp='none';
 $ldisp='block';
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
<!DOCTYPE html>
<html>
<title>S.R. Jawahar Babu - Blog</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="assets/js/jquery.min.js"></script>
<script>
$(document).ready(function(){
$('#user').click(function()
{
    if("no" === "<?php echo $logged;?>"){
        $("#log").css("display", "block");}
    else{
        $("#logged").css("display", "block");}
});
$('.like').click(function()
{
    if("no" === "<?php echo $logged;?>"){
        $("#nolog").css("display", "block");}
    else{      
         $(this).toggleClass('w3-blue w3-grey');  }
});
$('#logreg').click(function()
{
     $('#log').show();
     $('#nolog').hide();
});
$('#llink').click(function()
{
     $('#login').show();
     $('#register').hide();
});
$('#rlink').click(function()
{
     $('#register').show();
     $('#login').hide();
});

});
function changelike(imageid=0) {
    if("yes" === "<?php echo $logged;?>"){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                    document.getElementById('t'+imageid).innerHTML = this.responseText;
                    if(this.responseText <2){
                      document.getElementById('s'+imageid).innerHTML = " like";
            }
            else{
                document.getElementById('s'+imageid).innerHTML = " likes";
            }
                
        }
        };
        xmlhttp.open("GET", "like.php?mid=<?php echo $mid;?>&imageid="+imageid, true);
        xmlhttp.send();
    
}
}
</script>

<body class="w3-light-grey w3-content" style="max-width:1600px">
<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container">
    <a href="#" onclick="w3_close()" class="w3-hide-large w3-right w3-jumbo w3-padding w3-hover-grey" title="close menu">
      <i class="fa fa-remove"></i>
    </a>
    <img src="assets/img/i.jpg" style="width:45%;" class="w3-round"><br><br>
    <h4><b>S.R.Jawahar Babu</b></h4>
    <p class="w3-text-grey">Chairman, Pattukottai</p>
  </div>
  <div class="w3-bar-block">
                       <a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-text-grey w3-medium"><i class="fa fa-address-card-o fa-fw w3-margin-right w3-medium"></i> Timeline</a>
                        <a href="profile.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-medium"><i class="fa fa-newspaper-o fa-fw w3-margin-right w3-medium"></i>  Profile</a>
                        <a href="vote.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-medium"><i class="fa fa-thumbs-up fa-fw w3-margin-right w3-medium"></i>  Vote</a>
                        <a href="gallery.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-medium"><i class="fa fa-picture-o fa-fw w3-margin-right w3-medium"></i>  Gallery</a>
			<a href="feedback.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-medium"><i class="fa fa-pencil-square-o fa-fw w3-margin-right w3-medium"></i>  Feedback</a>
  </div>
</nav>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Header -->
  <header id="portfolio">
    <a id="user" class="w3-hover-indigo" href="#"><i class="fa fa-user fa-fw w3-margin-right w3-xxlarge w3-right" style="padding-top: 16px"></i></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1><b>S.R.Jawahar Babu, B.E.,M.B.A.</b></h1>
    <div class="w3-section w3-bottombar w3-padding-16">
    </div>
    </div>
  </header>
  
  <div id="log" class="w3-modal" style="display:<?php echo $logdisp; ?>">
  <div class="w3-modal-content w3-animate-zoom">
	<div class="w3-container w3-grey">
      <span onclick="document.getElementById('log').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
      <h1>Login/Register</h1>
    </div>

    <div class="w3-container">
	<div id="register" class="w3-padding-bottom" style="display:<?php echo $rdisp; ?>">
      <p>Register with your mobile number to join with us!</p>
               <p class="w3-text-red"><?php echo $msg1;?><?php echo $msg1="";?></p>
      <form name="register" method="post">
        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="mname"></p>
        <p style="padding-bottom:16px;"><input class="w3-col s2 text-center w3-input w3-border w3-padding-16" type="text" readonly value="+91"><input class="w3-col s10 w3-input w3-border w3-padding-16" type="text" placeholder="Mobile" required name="phone"></p><br>
        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Place" required name="place"></p>
        <table width="100%"><tr><td><input type="submit" name="register" value="Register" class="w3-button w3-dgrey"></td><td class="w3-padding-left">Already a member?     <span id="llink"><u>Login</u></span></td></tr></table>
      </form>
    	</div>

        <div id="login" class="w3-padding-bottom" style="display:<?php echo $ldisp; ?>">
      <p>Member? Login with your mobile number here!</p>
               <p class="w3-text-red"><?php echo $msg2;?><?php echo $msg2="";?></p>
      <form name="login" method="post">
        <p class="w3-padding-16"><input class="w3-col s2 text-center w3-input w3-border w3-padding-16" type="text" readonly value="+91"><input class="w3-col s10 w3-input w3-border w3-padding-16" type="text" placeholder="Mobile" required name="phone"></p><br>
        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Member code" required name="mcode"></p>
        <table width="100%"><tr><td><input type="submit" name="login" value="Login" class="w3-button w3-dgrey"></td><td class="w3-padding-left">New member?     <span id="rlink"><u>Register</u></span></td></tr></table>
      </form>
    	</div>

	</div>
  </div>
</div>
  
  
  <div id="logged" class="w3-modal" style="none">
  <div class="w3-modal-content w3-animate-zoom">
	<div class="w3-container w3-grey">
      <span onclick="document.getElementById('logged').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
      <h1>Member details</h1>
        </div>
    <div class="w3-container w3-center">
	   <table class=" w3-table " style="border:0px">
               <tr>
                                                                        <td><b>Name</b></td>
                                                                        <td><?php echo $_SESSION['mname']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                        <td><b>Mobile</b></td>
                                                                        <td><?php echo $_SESSION['phone']; ?></td>
                                                                </tr>
                                                                <tr>
                                                                        <td><b>Place </b></td>
                                                                        <td><?php echo $_SESSION['place']; ?></td>
                                                                </tr>

                                                </table>
        <div class="w3-padding-8"><a href="logout.php"><button class="w3-button w3-dgrey w3-large">Logout</button></a></div>
	</div>
  </div>
</div>
  
   <div id="nolog" class="w3-modal" style="display:none">
  <div class="w3-modal-content w3-animate-zoom">
	<div class="w3-container w3-grey">
      <span onclick="document.getElementById('nolog').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
      <h1>Login/Register as Member</h1>
    </div>

    <div class="w3-container">
      <p>Please Register or Login with your mobile number to use this feature!</p>
      <div class="w3-padding-8"><button id="logreg" class="w3-button w3-dgrey w3-large">Login/Register</button></a></div>
	</div>
  </div>
</div>
  
  <div class="w3-center w3-centered w3-container w3-padding-medium w3-border-bottom" style="align-content:center;margin-bottom:32px">
      <h4><b>Timeline</b></h4>
      <hr>
    <div class="w3-row-padding">
    <div class="w3-half w3-container w3-margin-bottom">
      <img src="assets/img/101.jpg" alt="Norway" style="height: 250px; width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white" style="height: 550px; position: relative;">
          <div class="w3-col s12"><h5 class="w3-left w3-padding-left"><b>Road Extension Project </b></h5> <p class="w3-right w3-text-grey w3-padding-right">20 Jan 2017</p></div><br>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1550s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
        <div class="w3-padding-bottom w3-col s12" style="position: absolute; bottom: 0;"> 
		<table style="width: 100%;">
		<tr>
				
					
                    <td ><i id="101" class="like w3-btn w3-grey w3-circle fa fa-thumbs-up w3-xlarge" onclick="changelike(this.id);"></i></td>
                    <td><span id="t101">0</span><span id="s101"> like</span></td>
					<td><i class=" w3-btn w3-grey w3-circle fa fa-share-alt w3-xlarge"></i></td>

					</tr>
			</table>
				</div>
      </div>
    </div>
    <div class="w3-half w3-container w3-margin-bottom">
      <img src="assets/img/102.jpg" alt="Norway" style="height: 250px; width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white" style="height: 550px; position: relative;">
          <div class="w3-col s12"><h5 class="w3-left w3-padding-left"> <b>River Dam Inaugration </b></h5> <p class="w3-right w3-text-grey w3-padding-right">16 Dec 2016</p></div><br>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1550s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software.</p>
        <div class="w3-padding-bottom w3-col s12" style="position: absolute; bottom: 0;"> 
		<table style="width: 100%;">
		<tr>
				
					
					<td ><i id="102" class="like w3-btn w3-grey w3-circle fa fa-thumbs-up w3-xlarge" onclick="changelike(this.id);"></i></td>
					<td><span id="t102">0</span><span id="s102"> like</span></td>
					<td><i class=" w3-btn w3-grey w3-circle fa fa-share-alt w3-xlarge"></i></td>

					</tr>
			</table>
				</div>
      
      </div>
    </div>
  </div>
  
  <!-- Second Photo Grid-->
  <div class="w3-row-padding">
    <div class="w3-half w3-container w3-margin-bottom">
      <img src="assets/img/103.jpg" alt="Norway" style="height: 250px; width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white" style="height: 550px;position: relative;">
          <div class="w3-col s12"><h5 class="w3-left w3-padding-left"><b>Bus Stand Renovation </b></h5> <p class="w3-right w3-text-grey w3-padding-right">3 Oct 2016</p></div><br>
        <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
        <div class="w3-padding-bottom w3-col s12" style="position: absolute; bottom: 0;"> 
		<table style="width: 100%;">
		<tr>
				
					
					<td ><i id="103" class="like w3-btn w3-grey w3-circle fa fa-thumbs-up w3-xlarge" onclick="changelike(this.id);"></i></td>
					<td><span id="t103">0</span><span id="s103"> like</span></td>
					<td><i class=" w3-btn w3-grey w3-circle fa fa-share-alt w3-xlarge"></i></td>

					</tr>
			</table>
				</div>
      </div>
    </div>
    <div class="w3-half w3-container w3-margin-bottom">
      <img src="assets/img/104.jpg" alt="Norway" style="height: 250px; width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white" style="height: 550px; position: relative;">
          <div class="w3-col s12"><h5 class="w3-left w3-padding-left"><b>Road Extension Project </b></h5> <p class="w3-right w3-text-grey w3-padding-right">20 Jan 2017</p></div><br>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1550s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
        <div class="w3-padding-bottom w3-col s12" style="position: absolute; bottom: 0;"> 
		<table style="width: 100%;">
		<tr>
				
					
					<td ><i id="104" class="like w3-btn w3-grey w3-circle fa fa-thumbs-up w3-xlarge" onclick="changelike(this.id);"></i></td>
					<td><span id="t104">0</span><span id="s104"> like</span></td>
					<td><i class=" w3-btn w3-grey w3-circle fa fa-share-alt w3-xlarge"></i></td>

					</tr>
			</table>
				</div>
      </div>
    </div>
  </div>    

  <div class="w3-row-padding">
    <div class="w3-half w3-container w3-margin-bottom">
      <img src="assets/img/105.jpg" alt="Norway" style="height: 250px; width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white" style="height: 550px; position: relative;">
          <div class="w3-col s12"><h5 class="w3-left w3-padding-left"><b>Road Extension Project </b></h5> <p class="w3-right w3-text-grey w3-padding-right">20 Jan 2017</p></div><br>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1550s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
        <div class="w3-padding-bottom w3-col s12" style="position: absolute; bottom: 0;"> 
		<table style="width: 100%;">
		<tr>
				
					
					<td ><i id="105" class="like w3-btn w3-grey w3-circle fa fa-thumbs-up w3-xlarge" onclick="changelike(this.id);"></i></td>
					<td><span id="t105">0</span><span id="s105"> like</span></td>                                       
					<td><i class=" w3-btn w3-grey w3-circle fa fa-share-alt w3-xlarge"></i></td>

					</tr>
			</table>
				</div>
      </div>
    </div>
    <div class="w3-half w3-container w3-margin-bottom">
      <img src="assets/img/106.jpg" alt="Norway" style="height: 250px; width:100%" class="w3-hover-opacity">
      <div class="w3-container w3-white" style="height: 550px; position: relative;">
          <div class="w3-col s12"><h5 class="w3-left w3-padding-left"> <b>River Dam Inaugration </b></h5> <p class="w3-right w3-text-grey w3-padding-right">16 Dec 2016</p></div><br>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1550s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software.</p>
        <div class="w3-padding-bottom w3-col s12" style="position: absolute; bottom: 0;"> 
		<table style="width: 100%;">
		<tr>
				
					
					<td ><i id="106" class="like w3-btn w3-grey w3-circle fa fa-thumbs-up w3-xlarge" onclick="changelike(this.id);"></i></td>
                                        <td><span id="t106">0</span> <span id="s106"> like</span></td>
					<td><i class=" w3-btn w3-grey w3-circle fa fa-share-alt w3-xlarge"></i></td>

					</tr>
			</table>
				</div>
      
      </div>
    </div>
  </div>
<!-- End page content -->
</div>
<?php
$rets=mysqli_query($conn,"SELECT mlike,COUNT(*) as count FROM memdetails where (mlike > 100 and mlike < 500) group by mlike");
    if(mysqli_num_rows($rets) >0){
        while($row = mysqli_fetch_assoc($rets)) {
            echo "<script>$(document).ready(function(){ $('#t".$row['mlike']."').text('".$row['count']."'); });</script>";
            if($row['count']>1){
                echo "<script>$(document).ready(function(){ $('#s".$row['mlike']."').text(' likes'); });</script>";
            }
            else{
                echo "<script>$(document).ready(function(){ $('#s".$row['mlike']."').text(' like'); });</script>";
            }
        }
    }
if($logged=="yes"){
    $retss=mysqli_query($conn,"SELECT mlike FROM memdetails where (mlike > 100 and mlike < 500) and mid='".$_SESSION['login']."'");
    if(mysqli_num_rows($retss) >0){
        while($rows = mysqli_fetch_assoc($retss)) {
            echo "<script>$(document).ready(function(){ $('#".$rows['mlike']."').removeClass('w3-grey'); $('#".$rows['mlike']."').addClass('w3-blue'); });</script>";
        }
    }
    }
    ?>
<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>


