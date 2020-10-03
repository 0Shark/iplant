<?php 
if ( ! session_id() ) {
session_start();

require('db.php');
}

    													// Nese kemi bere submit

    if (isset($_POST['username'])){

	

		$username = stripslashes($_REQUEST['username']); // heq backslashes

		$username = mysqli_real_escape_string($con,$username); // heq special characters nga string (for SQL injection protection)

		$password = stripslashes($_REQUEST['password']);

		$password = mysqli_real_escape_string($con,$password);

		

														//Shikojme nese perdoruesi eshte ekzistent nese jo del pjesa tek else...

        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";

		$result = mysqli_query($con,$query) or die(mysql_error());

		$rows = mysqli_num_rows($result);

        if($rows==1){

			$_SESSION['username'] = $username;

			header("Location: index.php");				 // Redirect user to index.php

            }else{

				echo "<br><br><div class='container'><div class='top'></div><div class='bottom'></div><div class='center'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='registration.php'>Register</a></div>";

				}

    }

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="utf-8">

<title>iPlant-Login</title>

<!-- Fav icon -->

<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">

<link rel="apple-touch-icon" href="img/favicon.png">
<!-- Vendosim google captcha scripts -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<link rel="stylesheet" href="css/login.css"/>

<link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>

<div class="container" onclick="onclick">

  <div class="top"></div>

  <div class="bottom"></div>

  <div class="center">

  			<br>

  			<br>

  			<br>

  			<br>

			<h2 style="color: #6aaf08;">Log In</h2>

			<form action="" method="post" name="login">

				<input  style=" border: 2px solid #6aaf08; border-radius: 4px; color: #6aaf08;" type="text" name="username" placeholder="Username" required />

				<input  style=" border: 2px solid #6aaf08; border-radius: 4px; color: #6aaf08;" type="password" name="password" placeholder="Password" required />

				<!--Google Captcha ka nevoje qe te behet host tek iplant.co
				<div align="center" class="g-recaptcha" data-sitekey="6Lf219EZAAAAACfAkUa3qJWlMlTOlpP1GtkVqBxt" required></div>
				-->
				<input  style=" border: 2px solid #6aaf08; border-radius: 4px; color: #6aaf08;" name="submit" type="submit" value="Login"/>

			</form>

			<p style="color: #6aaf08;">Not registered yet? <a style="color: #6aaf08;" href='registration.php'>Register Here</a></p>

			<a class="btn btn-custom btn-lg page-scroll" href="index.html">Home</a>

			<h2>&nbsp;</h2>

			

  </div>

</div>

<!-- E bejm captchan te detyrueshme -->
<script>

    window.onload = function() {

    var $recaptcha = document.querySelector('#g-recaptcha-response');



    if($recaptcha) {

        $recaptcha.setAttribute("required", "required");

    }

};

</script>



</body>

</html>

