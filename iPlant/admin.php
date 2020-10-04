<?php
require('db.php');
include("auth.php");
if($_SESSION['username']=="admin"){
$sql = "SELECT * FROM users";
if( isset($_GET['search']) ){
    $name = mysqli_real_escape_string($con, htmlspecialchars($_GET['search']));
    $sql = "SELECT * FROM users WHERE username ='$name'";
}
$result = $con->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
<title>Administration</title>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body style="overflow: hidden;">
<br>
<div class="container">
<label>Search</label><br>
<a href="admin.php">Show Complete list</a>
<form action="" method="GET">
<input type="text" placeholder="Search user" name="search">&nbsp;
<input type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">
</form>
<h2>List of users</h2>
<table class="table table-striped table-responsive">
<tr>
<th>Username</th>
<th>E-mail</th>
<th>Donate Amount</th>
<th>Register Date</th>
</tr>


<?php
while($row = $result->fetch_assoc()){
    ?>
    <tr>
    <td><?php echo $row['username']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['donor']; ?></td>
    <td><?php echo $row['trn_date']; ?></td>
    </tr>
    <?php
}
?>
</table>
<div style="text-align: center;">
<a href="index.php">HOME |</a>
<a href="profile.php"> PROFILE</a>
</div>
</div>
</body>
</html>
<?php
}
else{
    header("Location: 403.html");
}
?>