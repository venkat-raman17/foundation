<?php 
include("content.php");
?>
<!DOCTYPE html>
<html>
<title>S.R. Jawahar Babu - Vote</title>
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
$('#vote').click(function()
{
    if("no" === "<?php echo $logged;?>"){
        $("#nolog").css("display", "block");}
    else{
		 $('#resp').show();
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
$('#mlink').click(function()
{
     $('#fmcode').show();
     $('#log').hide();
});
});

function makevote() {
    if("yes" === "<?php echo $logged;?>"){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                   $('#votes').text(this.responseText);
        }
        };
        xmlhttp.open("GET", "makevote.php?mid=<?php echo $mid;?>", true);
        xmlhttp.send();
    
}
}
</script>
<script type="text/javascript">
function valid1()
{
if(document.register.mname.value!=="")
{ 
var re = new RegExp("^[a-zA-Z0-9_ ]*$");
 if(!re.test(document.register.mname.value)){
    alert("Invalid name!!"); 
    return false;
 }    
}
if(document.register.place.value!=="")
{ 
var re = new RegExp("^[a-zA-Z0-9_ ]*$");
 if(!re.test(document.register.place.value)){
    alert("Invalid Place!!"); 
    return false;
 }    
}
if(document.register.phone.value!=="")
{ 
    var reg = new RegExp("^[0-9]{10}$");
 if(!reg.test(document.register.phone.value)){
    alert("Invalid Phone number!!");
    return false;
 }    
}

return true;
}

function valid2()
{
	if(document.login.phone.value!=="")
{ 
    var reg = new RegExp("^[0-9]{10}$");
 if(!reg.test(document.login.phone.value)){
    alert("Invalid Phone number!!");
    return false;
 }    
}
if(document.login.mcode.value!=="")
{ 
    var reg = new RegExp("^[0-9]{5}$");
 if(!reg.test(document.login.mcode.value)){
    alert("Enter 5 digit member code!!"); 
    return false;
 }    
}
	return true;
}

function valid3()
{
	if(document.fmcode.mphone.value!=="")
{ 
    var reg = new RegExp("^[0-9]{10}$");
 if(!reg.test(document.fmcode.mphone.value)){
    alert("Invalid Phone number!!"); 
    return false;
 }    
}
return true;
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
    <h4><b>S.R ஜவகர்பாபு BE.MBA</b></h4>
    <p class="w3-text-grey">நகர்மன்றத் தலைவர், பட்டுக்கோட்டை</p>
  </div>
  <div class="w3-bar-block">
                        <a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-medium"><i class="fa fa-newspaper-o fa-fw w3-margin-right w3-medium"></i> Timeline</a>
                        <a href="profile.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-medium"><i class="fa fa-address-card-o fa-fw w3-margin-right w3-medium"></i>  Profile</a>
                        <a href="vote.php" onclick="w3_close()" class="w3-text-grey w3-bar-item w3-button w3-padding w3-medium"><i class="fa fa-thumbs-up fa-fw w3-margin-right w3-medium"></i>  Vote</a>
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
    <h1><b>S.R. ஜவகர்பாபு, B.E.,M.B.A.</b></h1>
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
      <form name="register" method="post" onsubmit="return valid1();">
        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="mname" maxlength="20"></p>
        <p style="padding-bottom:16px;"><input class="w3-col s2 text-center w3-input w3-border w3-padding-16" type="text" readonly value="+91"><input class="w3-col s10 w3-input w3-border w3-padding-16" type="text" placeholder="Mobile" required name="phone" maxlength="10"></p><br>
        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Place" required name="place" maxlength="20"></p>
        <table width="100%"><tr><td><input type="submit" name="register" value="Register" class="w3-button w3-dgrey"></td><td class="w3-padding-left">Already a member?     <span id="llink"><u>Login</u></span></td></tr></table>
      </form>
    	</div>

        <div id="login" class="w3-padding-bottom" style="display:<?php echo $ldisp; ?>">
      <p>Member? Login with your mobile number here!</p>
               <p class="w3-text-red"><?php echo $msg2;?><?php echo $msg2="";?></p>
      <form name="login" method="post" onsubmit="return valid2();">
        <p class="w3-padding-16"><input class="w3-col s2 text-center w3-input w3-border w3-padding-16" type="text" readonly value="+91"><input class="w3-col s10 w3-input w3-border w3-padding-16" type="text" placeholder="Mobile" required name="phone" maxlength="10"></p><br>
        <p><input class="w3-input w3-padding-16 w3-border" type="password" placeholder="Member code" required name="mcode"  maxlength="5"></p>
        <table width="100%"><tr><td><input type="submit" name="login" value="Login" class="w3-button w3-dgrey"></td><td class="w3-padding-left">Member code? <span id="mlink"><u>Send again</u></span></td><td class="w3-padding-left">New member?     <span id="rlink"><u>Register</u></span></td></tr></table>
      </form>
    	</div>

	</div>
  </div>
</div>



<div id="fmcode" class="w3-modal" style="display:<?php echo $fmcode; ?>">
  <div class="w3-modal-content w3-animate-zoom">
	<div class="w3-container w3-grey">
      <span onclick="document.getElementById('fmcode').style.display='none'" class="w3-button w3-display-topright w3-large">x</span>
      <h1>Send Member code</h1>
        </div>
    <div class="w3-container w3-center">
	<p>Enter your registered mobile number to get new member code!</p>
               <p class="w3-text-red"><?php echo $msg3;?><?php echo $msg3="";?></p>
      <form name="fmcode" method="post" onsubmit="return valid3();">
        <p class="w3-padding-16"><input class="w3-col s2 text-center w3-input w3-border w3-padding-16" type="text" readonly value="+91"><input class="w3-col s10 w3-input w3-border w3-padding-16" type="text" placeholder="Mobile" required name="mphone"  maxlength="10"></p><br>
        <div class="w3-padding-16"><input type="submit" name="fmcode" value="Send Code" class="w3-button w3-dgrey"></div>
      </form>
 
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
               <tr><td><b>Name</b></td><td><?php echo $_SESSION['mname']; ?></td></tr>
               <tr><td><b>Mobile</b></td><td><?php echo $_SESSION['phone']; ?></td></tr>
               <tr><td><b>Place </b></td><td><?php echo $_SESSION['place']; ?></td></tr></table>
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

  <div class="w3-center w3-centered w3-container w3-padding-large w3-border-bottom" style="align-content:center;margin-bottom:32px">
      <h4><b>Vote</b></h4>
      <hr>
      <div class="w3-col s12 w3-container w3-white w3-margin-bottom" style=" height: 400px;">
      <h6 class=" w3-padding-top">Make your support here. Click the button to register your vote to us.</h6>
	  	<div class="w3-center"><h6 class=" w3-padding-top">Totally <span id="votes">0</span> votes registered.</h6></div>
    <div  class="w3-display-middle" style="position: relative;">
        <i id="vote" class="w3-jumbo w3-btn w3-grey w3-circle fa fa-thumbs-o-up" onclick="makevote()"></i>
    </div>
            <div id="resp" class="w3-hide" style="position: relative; bottom: 0" >
                    <h5>Thanks for voting. Your vote has been registered.</h5>
</div>
    </div>
    

  </div>
  
<!-- End page content -->
</div>
<?php
$res=mysqli_query($conn,"select COUNT(*) as votes from member where vote=1");
        $num=mysqli_fetch_assoc($res);
           echo "<script>$(document).ready(function(){ $('#votes').text('".$num['votes']."'); });</script>";
        
if($logged=="yes"){
    $retss=mysqli_query($conn,"SELECT vote FROM member where mid='".$_SESSION['login']."'");
    $rows = mysqli_fetch_assoc($retss);
			if($rows['vote'] == 1){ 
            echo "<script>$(document).ready(function(){ $('#vote').removeClass('w3-grey'); $('#vote').addClass('w3-blue'); });</script>";
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


