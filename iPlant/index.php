<?php



include("auth.php"); //auth.php  security?>

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

  background-color: #333333;

  color: white;

  cursor: pointer;

  padding: 15px;

  border-radius: 4px;

}



#myBtn:hover {

  background-color: #d3f000;

}

</style>

<button onclick="topFunction()" id="myBtn" title="Info"><a href="https://climate.nasa.gov/"><img src="img/info.png" width="40px" height="40px"> CO2 in air now is 414 parts/million</a></button>
    
<!-- Navigation

    ==========================================-->

<nav id="menu" class="navbar navbar-default navbar-fixed-top on">

  <div class="container"> 

    <!-- Brand and toggle get grouped for better mobile display -->

    <div class="navbar-header">

      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>

      <a class="navbar-brand page-scroll" href="#page-top">iPlant</a>

  </div>

    

    <!-- Collect the nav links, forms, and other content for toggling -->

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">

        <li><a href="#"><img src="img/whot.png"> Hall of Trees</a></li>

        <li><a href="index.php" class="page-scroll">Home</a></li>

        <li><a href="#about" class="page-scroll">About</a></li>

        <li><a href="#services" class="page-scroll">App</a></li>

        <li><a href="#contact" class="page-scroll">Contact</a></li>

        <li><a href="#"><img width="25" height="25" src="img/profile.png"> Profile</a></li>

      </ul>

    </div>

  </div>

</nav>

<!-- Header -->

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

  </div>

</header>

<!-- About Section -->

<div id="about">

  <div class="container">

    <div class="row">

      <div class="col-xs-12 col-md-6" style="border-right: 2px solid grey">

        <div class="about-text">

          <h2>Getting started with <span>iPlant</span> </h2>

          <hr>

          <p>First things first. This website is all about helping environment and <span>planting trees</span>. Use our app, plant a tree and stick a QR code to the tree. Let others know more about your tree. Which is also connected to a special account. Spread the message! Go scan lots of QR codes and earn points and you will show

          up at the <span><a href="ht.php">Hall of Trees</a></span>. Take care of your tree and the environment around you!</p>

          <a href="#" class="btn btn-custom btn-lg page-scroll">Hall Of Trees</a>

          <a href="#services" class="btn btn-custom btn-lg page-scroll">Go to app</a> </div>



<!--Veteran Users-->

                <h2><img src="img/veteran.png" width="50" height="70"></img>iPlant Veterans:</h2>

      <hr>

      <?php

        $dbh = new PDO('mysql:host=localhost;dbname=register;charset=utf8mb4', 'root', '');

        $dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        $sqlget = "SELECT * FROM users";

        $sqldata = $dbh->query($sqlget) or die('ERROR');

        echo " <div style='border: 2px dashed #6aaf08' class='demo-1'>

                <h3>";

            while($row = $sqldata->fetch(PDO::FETCH_ASSOC)){

              echo $row['username']." ";

            }

        echo "  </h3>

              </div>

              ";

      ?>

      </div>

<!-- Welcome part -->

      <div class="col-xs-12 col-md-3" >

          <div class="form">

            <h2>Welcome <?php echo $_SESSION['username']; ?>!</h2>

            <hr>

            <p>Let's get started! You need to follow these steps:<br>

              <ul>

                <li>-Go plant your tree</li>

                <li>-Take a picture with the tree</li>

                <li>-Upload a photo of your tree here</li>

                <li>-Print your special QR code</li>

                <li>-Stick your QR code on your tree</li>

                <li>-Spread the message!</li>

              </ul>

             

            <a href="#" class="btn btn-custom btn-lg page-scroll">Upload</a>

            <a href="logout.php" class="btn btn-custom btn-lg page-scroll">Logout</a>

            <a href="#" class="btn btn-custom btn-lg page-scroll">1$ plants a tree</a> <p><b>Note:</b> "1$ plants a tree" is not available right now due to COVID-19</p>

            </p>

      </div>

    </div>

<!--Donators leaderboard-->

      <h2>iPlant leaderboard:</h2>

      <hr>

      <?php

require('db.php');


$sql = 'SELECT * from users ORDER BY donor desc';

$count = 1;

   

   if($result = mysqli_query($con, $sql)){

      if(mysqli_num_rows($result) > 0){     // Nese kemi rekorde

        // Nxjerrim table header
         echo "<p align='center'><b>Top Five</b></p>

              <table align='center' style=' font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'>";

         echo "<tr>";

         echo "<th style='border: 1px solid #ddd; padding:8px; padding-top: 12px;padding-bottom: 12px;text-align: left;background-color: #5f9d07;color: white;'>Rank</th>";

         echo "<th style='border: 1px solid #ddd; padding:8px; padding-top: 12px;padding-bottom: 12px;text-align: left;background-color: #5f9d07;color: white;'>Donation</th>";

         echo "<th style='border: 1px solid #ddd; padding:8px; padding-top: 12px;padding-bottom: 12px;text-align: left;background-color: #5f9d07;color: white;'>Username</th>";

         echo "</tr>";

         // Marrim rreshtin e 5 rekordeve te para

         while($row = mysqli_fetch_array($result)){

          if ($row['donor']!=0) {    

            if ($count<=5){

            echo "<tr>";

            echo "<td style='border: 1px solid #ddd; padding:8px;background-color: #7ac90a; color: white;'>" . $count . ")</td>";

            echo "<td style='border: 1px solid #ddd; padding:8px;'>" . $row['donor'] . "</td>";

            echo "<td style='border: 1px solid #ddd; padding:8px;'>" . $row['username'] . "</td>";

            echo "</tr>";

            }

            $count=$count+1;

            }

        }

         echo "</table>";

         mysqli_free_result($result);

      } else {                          // Nese nuk kemi rekorde ne databaze

         echo "No records were found.";

      }

}

?>

      

      

      <?php

      // Totali i donacioneve ku perfshihen edhe pemet qe do mbillen me applikacionin me QR code

        require('db.php');



        $sql="SELECT sum(donor) as total FROM users";



        $result = mysqli_query($con,$sql);



        while ($row = mysqli_fetch_assoc($result))

          { 

            echo "<p>Total trees planted <br>(including the iPlant users ones): </p><p align='center' style='font-size:50px'>".$row['total']."</p>";

          }

        mysqli_close($con);

?>

         

      

    </div>

  </div>

</div>

<!-- Application Section -->

<div id="services">

  <div class="container">

    <div class="col-md-10 col-md-offset-1 section-title text-center">

      <h2>Application</h2>

      <p>Make sure to allow access to camera</p>

      <hr>

          <iframe allow="camera" frameborder="0" style="height: 700px; overflow:hidden; width: 100%" marginheight="1" marginwidth="1" name="cboxmain" id="cboxmain" seamless="seamless" scrolling="no" frameborder="0" allowtransparency="true"src="scaner/docs/index.html"></iframe>

          <br>

    </div>

  </div>

</div>

<br><hr><h2 align="center" style="color: #6aaf08">Trees Planted by iPlant users</h2><hr>

<!-- MyMaps link -->

<iframe src="https://www.google.com/maps/d/u/0/embed?mid=1tf7bGYiFQr2rXCoamYM-zYUBfEjX5ZMi" width="100%" height="500" frameborder="0" seamless="seamless" scrolling="no" allowtransparency="true"></iframe>

<!-- Contact Section -->

<div id="contact" class="text-center">

  <div class="container">

    <div class="section-title text-center">

      <h2>Contact Us</h2>

      <hr>

      <p>Don't forget to get in touch with us!</p>

    </div>

    <div class="col-md-8 col-md-offset-2">

      <h3>Leave us a message</h3>

      <form name="sentMessage" id="contactForm" novalidate>

        <div class="row">

          <div class="col-md-6">

            <div class="form-group">

              <input type="text" id="name" class="form-control" placeholder="Name" required="required">

              <p class="help-block text-danger"></p>

            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">

              <input type="email" id="email" class="form-control" placeholder="Email" required="required">

              <p class="help-block text-danger"></p>

            </div>

          </div>

        </div>

        <div class="form-group">

          <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>

          <p class="help-block text-danger"></p>

        </div>

        <div id="success"></div>

        <button type="submit" class="btn btn-custom btn-lg">Send Message</button>

      </form>

    </div>

  </div>

</div>

<!-- Footer Section -->

<div id="footer">

  <div class="container text-center">

    <div class="col-md-8 col-md-offset-2">

      <div class="social">

        <ul>

          <!-- Twitter Acc -->
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>

        </ul>

      </div>

      <p>&copy; 2020 iPlant.</p>

    </div>

  </div>

</div>

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
