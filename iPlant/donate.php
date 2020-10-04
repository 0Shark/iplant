<?php 
include("auth.php"); //check if user is logged in ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
  <link rel="apple-touch-icon" href="img/favicon.png">
  <meta charset="UTF-8">
  <title>iPlant - Donate</title>
  <link rel='stylesheet' href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css'>
  <link rel="stylesheet" href="css/donate.css">


</head>
<body>
<div>
<!-- partial:index.partial.html -->
<link href='https://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>

<link href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/78060/animate.min.css" rel="stylesheet" type="text/css">

<div class="donate">
<img src="img/logo.png">
<h2>1$ PLANTS ONE TREE</h2>
<p style="color: white; font-size: 220%">NOTE: Tree planting is not available right now due to Covid-19. We'll get back to it as soon as possible!</p>
<hr>
<button>Donate</button>
<form name="donAmount" id="donAmount">
  <input type="radio" value="other" name="amount" id="other"/>
  <label for="other">Set amount</label>
</form>
</div>

<div id="custom">
  <h2>Donation Amount</h2>
  <form name="customDonation" id="customDonation" action="donate-db.php" method="post">
  <div class="input-group-1">
    <label for="custom-amount">$</label>
    <input id="custom-amount" name="custom-amount" type="text" required>
    <div class="warn"></div>
  </div>
  </form>
  </form>
  
  <div class="clearfix">
    <button class="back" type="button">Back
      <span></span>
      <span></span>
      <span></span>
    </button>
    <button class="next" type="button">Next</button>
  </div>
</div>

<section id="details">
  <div class="contact-info">
  <h2>Basic Information</h2>
  <form class="clearfix">
    <div class="input-group-2">
    <label>First Name</label>
    <input type="text" required>
    </div>
    <div class="input-group-2">
    <label>Last Name</label>
    <input type="text" required>
    </div>
    <div class="input-group-1">
    <label>Email Address</label>
    <input type="text" required>
    </div>
    
    <div class="input-group-1">
    <label>Street Address</label>
    <input type="text" required>
    </div>
    <div class="input-group-3">
    <label>City</label>
    <input type="text" required>
    </div>
    <div class="input-group-3">
    <label>State</label>
    <input type="text" required>
    </div>
    <div class="input-group-3">
    <label>Zip Code</label>
    <input type="text" required>
    </div>
  </form>
  <div class="clearfix">
    <button class="back" type="button">Back
      <span></span>
      <span></span>
      <span></span>
    </button>
    <button class="next" type="button">Next</button>
  </div>
  </div>
</section>

<section id="card">
    <div class="contact-info">
  <h2>Payment Information</h2>
  <form class="clearfix">
    <div class="input-group-1">
    <label>Card Number</label>
    <input type="text" required>
    </div>
    <div class="clearfix">
    <div class="input-group-2">
    <label>Expiration Date</label>
    <input type="text" required>
    </div>
    
    <div class="input-group-2">
    <label>Security Code (CVV)</label>
    <input type="text" required>
    </div>
    </div>
  </form>
  <div class="clearfix">
    <button class="back" type="button">Back
      <span></span>
      <span></span>
      <span></span>
    </button>
    <button class="next" type="button">Review</button>
  </div>
  </div>
</section>

<section class="processing">
<div class="check">
  <span></span>
  <div class="mask">
  </div>
  <span></span>
</div>

<div class="outer">
  <div class="inner">
  </div>
  <div class="progress">
  </div>
</div>
<span class="message">Processing</span>
</section>

<section id="check">
  <h2>Payment</h2>
  <p>Your contribution is</p>
  <span>$8888</span>
<button class="next">Next</button>
</section>

<section id="confirm">
  <h2>Thank You!</h2>
  <p>Your <span class="amount">$25</span> donation will help the planet with <strong>25 trees</strong>!</p>
  <button class="next" type="submit" form="customDonation">Confirm</button>
</section>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script><script  src="js/donate.js"></script>

</body>
</html>