<?php

require('db.php');

include("auth.php");

$usr = $_SESSION['username'];
$passcode = $_SESSION['code'];
if($usr=="admin" && $passcode=="##md5PasswordKey##"){
    
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
<link rel="stylesheet" type="text/css" href="css/admin.css">

</head>

<body>
<br>

<div class="container">

<label>Search</label><br>

<a href="admin.php">Show Complete list</a>

<form action="" method="GET">

<input type="text" placeholder="Search user" name="search">&nbsp;

<input type="submit" value="Search" name="btn" class="btn btn-sm btn-primary">

</form>

<div  style="margin: auto; border-color: black;" class="tabcontent">
<h2>User:</h2>
<h4>IP:</h4>
<h4>Location: 
</h4>
</div>

<table class="table table-striped table-responsive">



<tr>



<th>Username</th>



<th>E-mail</th>



<th>Register Date</th>



<th>Tree Nr.</th>



<th>Tree Images</th>



</tr>



<style type="text/css">

.dropdown-toggle, .dropdown-menu { width: auto } 

.btn-group img { margin-right: 10px }

.dropdown-toggle { padding-right: 50px }

.dropdown-toggle .glyphicon { margin-left: 20px; margin-right: -40px }

.dropdown-menu>li>a:hover { background: #f1f9fd } /* $search-blue */

.dropdown-header { background: #ccc; font-size: 14px; font-weight: 700; padding-top: 5px; padding-bottom: 5px; margin-top: 10px; margin-bottom: 5px }

.tabcontent {
  
}

.tablinks {
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
}
</style>







<?php
# LOCATION FUNCTION
	function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
	    $output = NULL;
	    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
	        $ip = $_SERVER["REMOTE_ADDR"];
	        if ($deep_detect) {
	            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
	                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
	                $ip = $_SERVER['HTTP_CLIENT_IP'];
	        }
	    }
	    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
	    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
	    $continents = array(
	        "AF" => "Africa",
	        "AN" => "Antarctica",
	        "AS" => "Asia",
	        "EU" => "Europe",
	        "OC" => "Australia (Oceania)",
	        "NA" => "North America",
	        "SA" => "South America"
	    );
	    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
	        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
	        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
	            switch ($purpose) {
	                case "location":
	                    $output = array(
	                        "city"           => @$ipdat->geoplugin_city,
	                        "state"          => @$ipdat->geoplugin_regionName,
	                        "country"        => @$ipdat->geoplugin_countryName,
	                        "country_code"   => @$ipdat->geoplugin_countryCode,
	                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
	                        "continent_code" => @$ipdat->geoplugin_continentCode
	                    );
	                    break;
	                case "address":
	                    $address = array($ipdat->geoplugin_countryName);
	                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
	                        $address[] = $ipdat->geoplugin_regionName;
	                    if (@strlen($ipdat->geoplugin_city) >= 1)
	                        $address[] = $ipdat->geoplugin_city;
	                    $output = implode(", ", array_reverse($address));
	                    break;
	                case "city":
	                    $output = @$ipdat->geoplugin_city;
	                    break;
	                case "state":
	                    $output = @$ipdat->geoplugin_regionName;
	                    break;
	                case "region":
	                    $output = @$ipdat->geoplugin_regionName;
	                    break;
	                case "country":
	                    $output = @$ipdat->geoplugin_countryName;
	                    break;
	                case "countrycode":
	                    $output = @$ipdat->geoplugin_countryCode;
	                    break;
	            }
	        }
	    }
	    return $output;
	}



while($row = $result->fetch_assoc()){



    ?>

	<div  style="margin: auto; border-color: black; display: none" class="tabcontent" id="<?php echo $row['username']; ?>">
	<h2>User: <?php echo $row['username']; ?></h2>
	<h4>IP: <?php echo $row['ip']; ?></h4>
	<h4>Location:
	<!--GETTING LOCATION FROM IP-->
	<?php
	# GET IP AND THEN RETURN ADDRESS
	echo ip_info($row['ip'], "Address");

	?>
	</h4>
	</div>

    <tr>



    <td><button class="tablinks" onclick="openInfo(event,'<?php echo $row['username'];?>')"><?php echo $row['username']; ?></button></td>



    <td><?php echo $row['email']; ?></td>

	<td><?php echo $row['trn_date']; ?></td>

    <td><?php echo $row['donor']; ?></td>
    <td>
		  <div class="btn-group">
		    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		      Tree images
		      <span class="glyphicon glyphicon-chevron-down"></span>
		    </button>
		    
		    <!--Tree images loop-->
		    <ul class="dropdown-menu">
	<?php
	        $current_user = $row['username'];
	        $select = "SELECT id FROM users WHERE username = '$current_user'";
	        $res = mysqli_query($con,$select);                                            
	        $row = mysqli_fetch_array($res);
	        $id = $row['id']; 
	        $db2 = mysqli_connect("localhost", "YOURDATABASENAME", "PASSWORD", "DATABASETABLE");
	        $select2 = "SELECT image FROM images WHERE id = '$id'"; 
	        if($res2 = mysqli_query($db2, $select2))
	        {
	          if(mysqli_num_rows($res2) > 0){
	             while($row2 = mysqli_fetch_array($res2))
	              {

	                echo "<li><a href='images/".$row2['image']."' title='tree'> <img width='50px' src='images/".$row2['image']."'>".$row2['image']."</a></li>";
	              }
	          }
	          else{
	            echo "No results";
	          }
	        }
	require('db.php');
	?>

		    </ul>
		  </div>
    </td>
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
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
<script>
function openInfo(evt, userName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(userName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
</html>

<?php

}

else{

    header("Location: 403.html");

}

?>
