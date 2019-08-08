<?php


//initialize the session
session_start();
//if session variable is not set it will reirect it to the login page
if(!isset($_SESSION['username'])|| empty($_SESSION['username'])){
	header("location: login.php");
	exit;
	//connection code
	require_once('config.php');
}

require_once('header.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<style type="text/css">
		h4{
     font-family: Times New Roman;
     font-size: 20px;
     color: #0652DD;

  }

	</style>
	
	<!--part one-->
	
		<h4>Hello, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b></h4>
	 <div>
              <center>
 
           <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1S0mXMHW3XL6B6GTTwcCqEJBDI52jgs5B" width="640" height="480"></iframe>

              </center>
               </div>
              
               
</body>
</html>
<!--footer part-->
<?php
include_once('footer.php');
?>
