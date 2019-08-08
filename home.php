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
?>
<?php
require_once('header.php');
?>

<body>
	 <a href="reset-password.php" class="txtname">Reset Your Password</a>
	<style type="text/css">
		h4{
     font-family: Times New Roman;
     font-size: 20px;
     color: #0652DD;

  }
   .txtname{
        width: 200px;
        background-color: #636e72;
        color: white;
        padding: 10px 10px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
     }

	</style>
	
	<!--part one-->
	
		<h4>Hello, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b></h4>
		<!--part two-->
		<link rel="stylesheet" type="text/css" href="style.css">
		<!--contaneir covering the slider images-->
		<div class="wrap">
			<!--creating an arrow class for both left and right arrows in the slider-->
			<div id="arrow-left" class="arrow">
			</div>
			<!--images sliders class-->
			<div id="slider">
				<div class="slide slide1">
					<div class="slide-content">
						<span></span>
					</div>
				</div>
				<div class="slide slide2">
					<div class="slide-content">
						<span></span>
					</div>
				</div>
             <div class="slide slide3">
					<div class="slide-content">
						<span></span>
					</div>
				</div>
				<div class="slide slide4">
					<div class="slide-content">
						<span></span>
					</div>
				</div>
				<div class="slide slide5">
					<div class="slide-content">
						<span></span>
					</div>
				</div>
			</div>
			<div id="arrow-right" class="arrow">
			</div>
		</div>
		<script >
			let sliderImages = document.querySelectorAll('.slide');
			   arrowLeft = document.querySelector('#arrow-left');
			   arrowRight = document.querySelector('#arrow-right');
			   //code below representing which image we are one
			   current = 0; 

			   function reset() {
			   		// body...
			   		for (let i = 0; i < sliderImages.length; i++) {
			   			sliderImages[i].style.display = 'none';
			   		}
			   	}	
			   	//initializes the slider
			   	function startSlide(){
			   		reset();
			   		sliderImages[0].style.display = 'block';
			   	}
			   	//show previous slide
			   	function slideLeft(){
			   		reset();
			   		sliderImages[current -1].style.display = 'block';
			   		current--;
			   	}
			   	//show next slide
			   	function slideRight(){
			   		reset();
			   		sliderImages[current + 1].style.display = 'block';
			   		current++;
			   	}
			   	//left arrow click
			   	arrowLeft.addEventListener('click' , function(){
			   		if ( current ===0) {
			   			current = sliderImages.length;
			   		}
			   		slideLeft();

			   	});
	//righ arrow click
			   	arrowRight.addEventListener('click' , function(){
			   		if ( current ===sliderImages.length - 1) {
			   			current = -1;
			   		}
			   		slideRight();

			   	});


			   	startSlide();

		</script>
<div>
	
	
</div>
</body>
</html>
<!--footer part-->
<?php
include_once('footer.php');
?>







 