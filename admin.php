<?php 
session_start();
include("checklogin.php");
check_login();
include("adphp.php");
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
function tvalid(){
if(document.newt.tdate.value!=="")
{ 
 }
return true;    
}
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
        <form name="newt" id="newt" method="post" enctype="multipart/form-data" onsubmit="return tvalid();">
			<p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Title" required name="titlet" maxlength="50"></p>
			<div class="w3-padding-16">Image <input type="file" name="filet" id="filetid">
			Post date <input type="date" name="tdate" value="<?php echo date('Y-m-d');?>" step="1"></div>
            <div><textarea class="w3-input w3-padding-16" maxlength="510" rows="15" cols="35" wrap="soft" required placeholder="Content" required name="content" form="newt"></textarea></div>
            <div class="w3-padding-16"><input name="newt" class="w3-button w3-dgrey" value="Add" type="submit"></div>
        </form>
    </div>
  </div>


<div class="w3-half w3-container w3-margin-bottom"> 
	<h6 class=" w3-padding-top"><b>Timeline Posts</b></h6>
    <div class="w3-card w3-grey w3-padding-16">
	<p class="w3-text-red"><?php echo $msg2;?><?php echo $msg2="";?></p>
        <table class="w3-table-all w3-hoverable w3-responsive">
                              <thead>
                                <tr class="w3-grey">
                                  <th>Title</th> 
                                  <th>Date</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                  <?php $tac=mysqli_query($conn,"select tid,title,UNIX_TIMESTAMP(tdate) as timestamp from timeline ORDER BY tdate DESC");
							  while($row=mysqli_fetch_assoc($tac))
							  {?>
                              <tr>
				<form method="post" name="tdelete" onsubmit="return confirm('Are you sure to delete this timeline entry?');">
				<div class="w3-hide"><input name="tid" value="<?php echo $row['tid']?>" type="text"></div>
                                  <td><?php echo $row['title']?></td>
                                  <td><?php echo date("d/m/Y",$row['timestamp']);?></td>
                                  <td><input name="tdelete" class="w3-button w3-dgrey" value="Delete" type="submit"></td>
				</form>                          
                              </tr>
                              <?php }?>
                              </tbody>
                            </table>
    </div>
  </div>

  
  </div>
<!-- End page content -->
</div>
</div>
</body>
</html>


