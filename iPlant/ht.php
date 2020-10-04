<?php 

require('db.php');

include("auth.php"); //check if user is logged in ?>

<!DOCTYPE html>

<html>

<head>

	<title>iPlant-Blog</title>

	<script type="text/javascript" src="js/leaves.js"></script>

  <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">

  <link rel="apple-touch-icon" href="img/favicon.png">

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css'>

	<link rel="stylesheet" type="text/css" href="css/blog.css">

</head>

<body>



<div class="blog-slider">

  <a href="profile.php" class="blog-slider__button">My Profile </a><b> Username: </b><span><?php echo $_SESSION['username']; ?></span>

  <div class="blog-slider__wrp swiper-wrapper">



     <?php

        $select = "SELECT trn_date FROM users WHERE username ='".$_SESSION['username']."'";

        $res = mysqli_query($con,$select);                                                      #Selecting logged in user ID

        $row = mysqli_fetch_array($res);

        $date = substr($row['trn_date'], 0, strlen($row['trn_date'] ) - 8);





        $db2 = mysqli_connect("localhost", "root", "", "image_upload");



        $select2 = "SELECT image,image_text FROM images"; 

        if($res2 = mysqli_query($db2, $select2))

        {

          if(mysqli_num_rows($res2) > 0){

             while($row2 = mysqli_fetch_array($res2))

              {

                $imgtitle = substr($row2['image'], 0, strlen($row2['image']) - 4);





      ?>



    <div class="blog-slider__item swiper-slide">

      <div class="blog-slider__img">

        <?php

        echo "<img width='100%' src='images/".$row2['image']."'>";

        ?>

      </div>

      <div class="blog-slider__content">

        <span class="blog-slider__code"><?php echo $date; ?></span>

        <div class="blog-slider__title"><?php echo $imgtitle; ?></div>

        <div class="blog-slider__text"><?php echo $row2['image_text']; ?></div>

      </div>

    </div>

    

<?php

                }

          }

          else{

            echo "<img src='img/opps.png'></img>";

          }

        }

?>



  </div>

<div class="blog-slider__pagination"></div>

    <img src="img/hts.png" style="vertical-align: bottom;">

</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js'></script><script type="text/javascript" src="js/blog.js"></script>

</body>

</html>
