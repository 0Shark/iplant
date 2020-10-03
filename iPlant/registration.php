<!DOCTYPE html>

<html>

<head>

<meta charset="utf-8">

<title>iPlant-Registration</title>

<link rel="stylesheet" href="css/login.css"/>

<link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>

<?php

	require('db.php');

   															 		// Nese i kemi bere submit i hedhim ne DB

    if (isset($_REQUEST['username'])){

    	$donate=0;

		$username = stripslashes($_REQUEST['username']); 			// heqim backslashes

		$username = mysqli_real_escape_string($con,$username); 		//heqim special characters ne string

		$email = stripslashes($_REQUEST['email']);

		$email = mysqli_real_escape_string($con,$email);

		$password = stripslashes($_REQUEST['password']);

		$password = mysqli_real_escape_string($con,$password);



		$trn_date = date("Y-m-d H:i:s");														// enkriptim me md5

        $query = "INSERT into `users` (username, password, email, trn_date, donor) VALUES ('$username', '".md5($password)."', '$email', '$trn_date','$donate')";

        $result = mysqli_query($con,$query);

        if($result){	// nese eshte regjistruar me sukses, nxjerrim link per login

            echo "<div class='container'><div class='top'></div><div class='bottom'></div><div class='center'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div></div>";

        }

    }

    else{

?>

<div class="container" onclick="onclick">

  <div class="top"></div>

  <div class="bottom"></div>

  <div class="center">

  			<br>

  			<br>

  			<br>

  			<br>

			<h2 style="color: #6aaf08;">Registration</h2>

			<form name="registration" action="" method="post">

				<input style=" border: 2px solid #6aaf08; border-radius: 4px; color: #6aaf08;" type="text" name="username" placeholder="Username" required />

				<input style=" border: 2px solid #6aaf08; border-radius: 4px; color: #6aaf08;" type="email" name="email" placeholder="Email" required />

				<input style=" border: 2px solid #6aaf08; border-radius: 4px; color: #6aaf08;" type="password" name="password" placeholder="Password" required />

				<input style=" border: 2px solid #6aaf08; border-radius: 4px; color: #6aaf08;" type="submit" name="submit" value="Register" />

			</form>

			<a class="btn btn-custom btn-lg page-scroll" href="index.html">Home</a>

			<h2>&nbsp;</h2>

			

  </div>

</div>

<?php } ?>

</body>

</html>

