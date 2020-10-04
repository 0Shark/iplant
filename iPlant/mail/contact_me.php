<?php
require('db2.php');

if ($_POST['sent']){
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
$query = "INSERT into `iPlant_mail` (name, email, msg) VALUES ('$name', '$email_address', '$message')";

// Output mail
$to = 'mail@gmail.com';
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
$headers = "From: mailer@gmail.com\n";
$headers .= "Reply-To: $email_address";	

echo $to.$email_subject.$email_body.$headers;


return true;			

}
?>