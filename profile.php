<!DOCTYPE html>
<html>
<title>S.R. Jawahar Babu - Profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        <a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-medium"><i class="fa fa-address-card-o fa-fw w3-margin-right w3-medium"></i> Timeline</a>
                        <a href="profile.php" onclick="w3_close()" class="w3-text-grey w3-bar-item w3-button w3-padding w3-medium"><i class="fa fa-newspaper-o fa-fw w3-margin-right w3-medium"></i>  Profile</a>
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
    <a class="w3-hover-blue-grey" href="#"><i class="fa fa-user fa-fw w3-margin-right w3-xxlarge w3-right" style="padding-top: 16px"></i></a>
    <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
    <div class="w3-container">
    <h1><b>S.R.Jawahar Babu, B.E.,M.B.A.</b></h1>
    <div class="w3-section w3-bottombar w3-padding-16">
    </div>
    </div>
  </header>
  

  <!-- Images of Me -->
  <div class="w3-row-padding w3-padding-16" id="about">
      <div style="padding-left: 20%; padding-right: 20%">
      <img class="w3-image w3-circle" src="assets/img/a.jpg" alt="Me" style="width:100%">
    </div>
  </div>

  <div class="w3-center w3-centered w3-container w3-padding-large w3-border-bottom" style="align-content:center;margin-bottom:32px">
      <h4><b>Profile</b></h4>
      <hr>
    <table class=" w3-table " style="border:0px">

                                                                <tr>
                                                                        <td><b>NAME</b></td>
                                                                        <td>S.R.Jawahar Babu, B.E.,M.B.A.</td>
                                                                </tr>
                                                                <tr>
                                                                        <td><b>D.O.B </b></td>
                                                                        <td>26.06.1981</td>
                                                                </tr>
                                                                <tr>
                                                                        <td><b>PLACE </b></td>
                                                                        <td>Pannavayal</td>
                                                                </tr>
                                                                <tr>
                                                                        <td><b>PHONE </b></td>
                                                                        <td>9865401444, 9842440444</td>
                                                                </tr>

                                                                <tr>
                                                                        <td><b>ADDRESS </b></td>
                                                                        <td>Chairman Office, Pattukottai.</td>
                                                                </tr>





                                                </table>
    <hr>
    <hr>
    <h4><b>Profession</b></h4>
    <div>
    <p class="w3-text-black">Students Chairman, Mookambigai College.</p>
    <p class="w3-text-black">Chairman of lions club of queen city, Pattukottai</p>
    <p class="w3-text-black">Students Chairman, Mookambigai College.</p>
    <p class="w3-text-black">Chairman of lions club of queen city, Pattukottai</p>
    </div>

<!-- End page content -->
</div>

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


