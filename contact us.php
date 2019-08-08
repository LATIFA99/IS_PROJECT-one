<?php
	//initialize the session
session_start();
//if session variable is not set it will reirect it to the login page
if(!isset($_SESSION['username'])|| empty($_SESSION['username'])){
    header("location: login.php");
    exit;
  include('config.php');
}
?>
<?php

require_once('header.php');
?>

	<?php

	if (isset($_POST['submitted'])) {
 
 		//registration form
	$fname= $_POST['fname'];
	$email= $_POST['email'];
	$phonenumber= $_POST['phonenumber'];
	$message= $_POST['message'];
	$sqlinsert= "INSERT INTO people (name, email, phoneNumber, comment) VALUES ('$fname', '$email', '$phonenumber', '$message')";

	
		if (!mysqli_query($conn, $sqlinsert)) {
		die('Something went wrong!');
	}
	// echo "Sent Successfully! Thank you"." ".$fname.",We will contact you shortly!";

	

 }//end of main if
 
 ?>
 <div >
	<h2 >Fill in the Details Below</h2>
	<form action="contact us.php" method="POST">
		<input type="hidden" name="submitted" value="true" />
		<input type="text" name="fname" style="height: 35px" size="50" placeholder="Your Name"/><br/><br/>
		<input type="text" name="email" style="height: 35px" size="50" placeholder="Email Address"/><br/><br/>
		<input type="text" name="phonenumber" style="height: 35px" size="50" placeholder="Phone Number"/><br/><br/>
		<textarea type="text" style="height: 70px; width: 300px" name="message" placeholder="Your Message"></textarea><br/><br/>
		  <input type="submitted" value="submitted"/>
	</form>
</div>	

<div>

