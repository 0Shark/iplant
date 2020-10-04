<?php 

require('db.php');

include("auth.php"); //check if user is logged in ?>



<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>iPlant</title>

<meta name="description" content="">

<meta name="author" content="">

<meta http-equiv="Cache-control" content="no-cache">

<!-- Favicons

    ================================================== -->

<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">

<link rel="apple-touch-icon" href="img/favicon.png">

<!-- Bootstrap -->

<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">

<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

<!-- Slider

    ================================================== -->

<link href="css/owl.carousel.css" rel="stylesheet" media="screen">

<link href="css/owl.theme.css" rel="stylesheet" media="screen">



<!-- Stylesheet

    ================================================== -->

<link rel="stylesheet" type="text/css" href="css/style.css">

<link rel="stylesheet" type="text/css" href="css/nivo-lightbox/nivo-lightbox.css">

<link rel="stylesheet" type="text/css" href="css/nivo-lightbox/default.css">

<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="css/hello.css">

</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<style type="text/css">

#myBtn {

  display: none;

  position: fixed;

  bottom: 20px;

  right: 30px;

  z-index: 99;

  font-size: 18px;

  border: none;

  outline: none;

  background-color: green;

  color: white;

  cursor: pointer;

  padding: 15px;

  border-radius: 4px;

}



#myBtn:hover {

  background-color: #555;

}

</style>

<?php

  if ($_SESSION['username']=="admin") {

    

  

?>

<button onclick="topFunction()" id="myBtn" title="admin"><a href="admin.php">Administration</a></button>

<?php

  }

?>



<!-- Navigation

    ==========================================-->

<nav id="menu" class="navbar navbar-default navbar-fixed-top">

  <div class="container"> 

    <!-- Brand and toggle get grouped for better mobile display -->

    <div class="navbar-header">

      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <a class="navbar-brand page-scroll" href="#page-top">iPlant</a> </div>

    

    <!-- Collect the nav links, forms, and other content for toggling -->

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">

        <li><a href="ht.php"><img src="img/whot.png"> Hall of Trees</a></li>

        <li><a href="index.php" class="page-scroll">Home</a></li>

        <li><a href="#about" class="page-scroll">About</a></li>

        <li><a href="#services" class="page-scroll">App</a></li>

        <li><a href="#contact" class="page-scroll">Contact</a></li>

        <li><a href="profile.php"><img width="25" height="25" src="img/profile.png"> Profile</a></li>

      </ul>

    </div>

    <!-- /.navbar-collapse --> 

  </div>

  <!-- /.container-fluid --> 

</nav>

<header id="header">

  <div class="intro">

    <div class="overlay">

      <div class="container">

        <div class="row">

          <div class="col-md-8 col-md-offset-2 intro-text">

            <img src="img/logo.png">

            <p>Welcome to iPlant <b><?php echo $_SESSION['username']; ?></b>!<br>

              Let's plant trees together...</p>

            <a href="#about" class="btn btn-custom btn-lg page-scroll">Let's go</a> </div>

        </div>

      </div>

    </div>

          <video width="100%" height="800" autoplay loop>

    <source src="videos/video.mp4" type="video/mp4">

  </video>

  </div>

</header>

<div align="center">

<a href="#about" class="page-scroll">

<img src="img/down.gif" height="70px"  >

</a>

</div>

<!-- Profile-->

<div id="about">

  <h2 align="center" style="font-size:45px">PROFILE</h2>

  <div class="container">

    <div class="row">

      <div class="col-xs-12 col-md-6">  

          <div class="form">

            <h2>User</h2>

            <hr>

            <img id="profilepic" style="border: 3px dashed green" height="210" width="150">

            <h3><b>Username:</b> <?php echo $_SESSION['username']; ?></h3> 



            <a href="upload.php" class="btn btn-custom btn-lg page-scroll">Upload</a>

            <a href="logout.php" class="btn btn-custom btn-lg page-scroll">Logout</a>

            

          </div>

      </div>

      <div class="col-xs-12 col-md-6">  

          <div class="form">

            <h2>Donations</h2>

            <hr>

             <?php

              $con = mysqli_connect("localhost","root","", "register") or die ("could not connect to mysql");                           

              $select = "SELECT donor FROM users WHERE username ='".$_SESSION['username']."'";



              $res = mysqli_query($con,$select) or die( mysqli_error($con));

              $row = mysqli_fetch_array($res);

              $donor = $row['donor']; 



              if ($donor==0) {

                echo("<img src='img/sad.png' width='90px' height='90px'></img>");

                echo("<h3>You don't seem to have donated!</h3>");

              }

              else{

                echo("<img src='img/happy.png' width='90px' height='90px'></img>");

                echo("<h3>~You seem to have donated ".$donor."$.<br><br>~".$donor." trees will be planted.<br><br>~Nature thanks you!</h3>");

              }



             ?>

            <a href="donate.php" class="btn btn-custom btn-lg page-scroll">Donate</a>



            

          </div>

      </div>      

      <br>

    </div>

  </div>

</div>



<div id="services">

  <div class="container">

    <div class="col-md-10 col-md-offset-1 section-title text-center">

      <h2>Your trees:</h2>

      <hr>

      <?php



        $select = "SELECT id FROM users WHERE username ='".$_SESSION['username']."'";

        $res = mysqli_query($con,$select);                                                      #Selecting logged in user ID

        $row = mysqli_fetch_array($res);

        $id = $row['id']; 



        $db2 = mysqli_connect("localhost", "root", "", "image_upload");



        $select2 = "SELECT image,image_text FROM images WHERE id = '$id'"; 

        if($res2 = mysqli_query($db2, $select2))

        {

          if(mysqli_num_rows($res2) > 0){

             while($row2 = mysqli_fetch_array($res2))

              {

                echo "<div style='width: 100%; background-color: white; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-bottom: 25px;'>

                <img width='100%' src='images/".$row2['image']."'>

                </div>";



                echo "<div style='text-align: center;padding: 10px 20px; background-color: #b5ff4d;'>

                <p>".$row2['image_text']."</p>

                </div><br><br>";

              }

          }

          else{

            echo "<img src='img/opps.png'></img>";

          }

        }

        

      ?>

    </div>

  </div>

</div>



<!-- Footer Section -->

<div id="footer">

  <div class="container text-center">

    <div class="col-md-8 col-md-offset-2">

      <div class="social">

        <ul>

          <li><a href="https://twitter.com/iPlant13"><i class="fa fa-twitter"></i></a></li>

        </ul>

      </div>

      <p>&copy; 2020 iPlant.</p>

    </div>

  </div>

</div>

<script>

//Get the button

var mybutton = document.getElementById("myBtn");



// When the user scrolls down 20px from the top of the document, show the button

window.onscroll = function() {scrollFunction()};



function scrollFunction() {

  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {

    mybutton.style.display = "block";

  } else {

    mybutton.style.display = "none";

  }

}



// When the user clicks on the button, scroll to the top of the document

function topFunction() {

  document.body.scrollTop = 0;

  document.documentElement.scrollTop = 0;

}

</script>

<script type="text/javascript" src="js/profilepic.js"></script> 

<script type="text/javascript" src="js/jquery.1.11.1.js"></script> 

<script type="text/javascript" src="js/bootstrap.js"></script> 

<script type="text/javascript" src="js/nivo-lightbox.js"></script> 

<script type="text/javascript" src="js/jquery.isotope.js"></script> 

<script type="text/javascript" src="js/owl.carousel.js"></script> 

<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 

<script type="text/javascript" src="js/contact_me.js"></script> 

<script type="text/javascript" src="js/main.js"></script>

</body>

</html>

