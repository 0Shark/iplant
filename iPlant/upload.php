<?php
include("auth.php");
  // Create database connection
  $db = mysqli_connect("localhost", "id12250873_iplant2", "juledelmer", "id12250873_image_upload");
  $db2 = mysqli_connect("localhost", "id12250873_iplant", "juledelmer", "id12250873_register");

  $id = "";
  // Initialize message variable
  $msg = "";
  // Output color
  $color = "";
  //link
  $link = "";
  //Detect
  $det = "";
  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);

    $select = "SELECT id FROM users WHERE username ='".$_SESSION['username']."'";
    $res = mysqli_query($db2,$select);
    $row = mysqli_fetch_array($res);
    $id = $row['id']; 



  	$sql = "INSERT INTO images (id,image, image_text) VALUES ('$id','$image', '$image_text')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "IMAGE UPLOADED SUCCESSFULLY";
      $color = "green";
      $link = "<a href='generator.php'>  QR Code Generator</a>";
      $det = "1";
  	}else{
  		$msg = "FAILED TO UPLOAD IMAGE";
      $color = "red";
      $det = "1";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM images");

  if($det=="1"){
      echo "<div  align='center'  style='background-color:".$color."; color: white'><h1>".$msg."<br>".$link."</h1></div>";
  ?>
  <style>

  div.polaroid {

  width: 100%;
  background-color: white;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  margin-bottom: 25px;
}

div.container {
  text-align: center;
}

a{
  background: linear-gradient(to bottom, var(--mainColor) 0%, var(--mainColor) 100%);
  background-position: 0 100%;
  background-repeat: repeat-x;
  background-size: 3px 3px;
  color: #000;
  text-decoration: none;
}

a:hover {
  background-image: 
}
</style>
  <div class="polaroid">

  <?php
      echo "<img style='transform: scale(0.3)' src='images/".$image."' alt='IMAGE PATH ERROR' '";
  ?>
      <div class="container">
        <?php
          echo "<h1 style='text-align: center;'>".$image_text."</h1>";
        ?>
      </div>
  </div>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";   //Just for space...



<?php
      mysqli_close($db);
      mysqli_close($db2);
  }

?>


<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<link rel="stylesheet" href="css/login.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
<link rel="apple-touch-icon" href="img/favicon.png">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body scroll="no" style="overflow: hidden">
<div id="content" class="container" onclick="onclick">
  <div class="top"></div>
  <div class="bottom"></div>
  <div class="center">
  <div>
  <br>
  <br>
  <form method="POST" action="upload.php" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000" class="btn btn-custom btn-lg page-scroll">
    <div align="center">
      <input type="file" name="image" style=" border: 2px solid #6aaf08; border-radius: 4px; color: white; width: 85% " class="btn btn-custom btn-lg page-scroll">
    </div>
    <div align="center">
      <textarea style="border: 2px solid #6aaf08; border-radius: 4px; color: #6aaf08; resize: none; " 
        id="text" 
        cols="40" 
        rows="4" 
        name="image_text" 
        placeholder="Say something about your tree..."></textarea>
    </div>
    <div align="center" class="g-recaptcha" data-sitekey="6Lf219EZAAAAACfAkUa3qJWlMlTOlpP1GtkVqBxt" required></div>
    <br>
    <div align="center"> 
        <button type="submit" name="upload" class="btn btn-custom btn-lg" style="">POST</button>
    </div>
   
  </form>
</div>
</div>
</div>
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