<html>
<head>
<title>iPlant-QR Generator</title>
<link rel="stylesheet" href="css/login.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
<link rel="apple-touch-icon" href="img/favicon.png">
<link rel="stylesheet" type="text/css" href="css/qrstack.css">
</head>
<body>
<div class="container" onclick="onclick">
  <div class="bottom"></div>
  <div class="center">
  	<br>
  	<br>
  	<br>
  	<br>
  	<br>
  	<br>
  	<br>
  	<br>
  	<br>
  	<br>
  	<br>
  	<br>
  	<br>
  	<br>
		<h1 align="center" style="color: #6aaf08">QR Code<br>Generator</h1>

		<form action="generator.php" method="post">
			<input type="text" name="txtqr" placeholder="Enter text" style=" border: 2px solid #6aaf08; border-radius: 4px;" />
			<input type="submit" name="btnsubmit" value="Generate" style=" border: 2px solid #6aaf08; border-radius: 4px; color: #6aaf08;"/>
			
		</form>
		<a href="index.php" class="btn btn-custom btn-lg page-scroll">HOME</a><br><br>
		<?php
			if(isset($_POST['btnsubmit']))
			{
				$data = trim($_POST['txtqr']);

				echo "<h2 style='color:#6aaf08'>Output:</h2>";
				echo "<div class='parent'><img class='image1' src='img/border.png' height=200 width=200/><img class='image2' src='https://chart.googleapis.com/chart?cht=qr&chs=150x150&chl=$data' height=180 width=180 /></div><br>";
				echo "<a href='https://chart.googleapis.com/chart?cht=qr&chs=150x150&chl=$data' download='iplantcode'><img src='img/download.png' width='60px' height='60px'></img></a>
					 ";
			}
		?>	
	</div>
</div>
</body>
</html>
