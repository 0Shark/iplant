<?php 

include("auth.php"); //check if user is logged in ?>

<html lang="en" >

<head>

  <title>iPlant says thanks!</title>

    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">

  <link rel="apple-touch-icon" href="img/favicon.png">

  <meta charset="UTF-8">

  <link rel='stylesheet' href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>

  <link rel="stylesheet" href="css/donate.css">

</head>

<body>

<!DOCTYPE html>

<link href='https://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>

<link href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/78060/animate.min.css" rel="stylesheet" type="text/css">

  <?php   

    $con = mysqli_connect("localhost","root","") or die ("could not connect to mysql"); ;                           

    $donate = stripslashes($_REQUEST['custom-amount']);    

    $donate = mysqli_real_escape_string($con,$donate); 

    $don = $_POST['custom-amount'] ;



mysqli_select_db($con, "register") or die ("no database");  

$select = "SELECT id FROM users WHERE username ='".$_SESSION['username']."'";

$select2 = "SELECT donor FROM users WHERE username ='".$_SESSION['username']."'";



$res = mysqli_query($con,$select);

$row = mysqli_fetch_array($res);

$id = $row['id']; 



$res2 = mysqli_query($con,$select2);

$row2 = mysqli_fetch_array($res2);

$donor = $row2['donor']; 



$donatetotal = $donor + $donate;



$sql = "UPDATE `users` SET `donor` = $donatetotal WHERE id = $id";

$result = mysqli_query($con, $sql);

if(!$result)

{

    echo "

          <h2 color='red'>Database Error</h2>

         ";

}

else{

?>





  <h2 style="font-size: 60px; color: white">Thank You!</h2>

  <p style="font-size: 40px; color: white">Go to profile:</p>

  <a href="profile.php"><img width="85" height="85" src="img/profile.png"></a>



<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>                                                 

<script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>

<script  src="js/donate-db.js"></script>

<?php } ?>

</body>

</html>

