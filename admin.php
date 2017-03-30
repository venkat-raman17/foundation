<?php 
session_start();
include("adphp.php");
include("checklogin.php");
check_login();
$msg1="";
?>
<!DOCTYPE html>
<html>
<title>S.R. Jawahar Babu - Admin Page</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="assets/js/jquery.min.js"></script>
<script>
$(document).ready(function(){

});
</script>


<script type="text/javascript">

</script>



<body class="w3-light-grey w3-content" style="max-width:1600px">
<div class="w3-main" class="w3-padding-small">


  <header id="portfolio">
    <div class="w3-container">
    <h1><b>S.R. ஜவகர்பாபு, B.E.,M.B.A.</b></h1>
    <div class="w3-section w3-bottombar w3-padding-16">
    </div>
    </div>
  </header>
  
  


  <div class="w3-center w3-centered w3-container w3-padding-small w3-border-bottom" style="align-content:center;margin-bottom:32px">
      <h4><b>Admin Page</b></h4>
      <hr>
    <div class="w3-row-padding"> 

    <div class="w3-half w3-container w3-margin-bottom"> 
	<h6 class=" w3-padding-top"><b>Add Post</b></h6>
    <div class="w3-card w3-grey w3-padding-8">
	<p class="w3-text-red"><?php echo $msg1;?><?php echo $msg1="";?></p>
        <form name="newt" id="newt" method="post" enctype="multipart/form-data">
			<p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Title" required name="titlet" maxlength="50"></p>
			<div class="w3-padding-16">Image <input type="file" name="filet" id="filetid">
			Post date <input type="date" name="tdate" value="<?php echo date('Y-m-d');?>" step="1"></div>
            <div><textarea class="w3-input w3-padding-16" maxlength="510" rows="15" cols="35" wrap="soft" placeholder="Content" required name="content" form="newt"></textarea></div>
            <div class="w3-padding-16"><input name="newt" class="w3-button w3-dgrey" value="Add" type="submit"></div>
        </form>
    </div>
  </div>

  
  </div>
<!-- End page content -->
</div>
</div>
</body>
</html>


