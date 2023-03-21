<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<script src="../script/script.js"></script>
  	<link rel="stylesheet" href="../css/Home.css">
	  <link rel="stylesheet" href="../css/aboutus.css">
	<title>Water Refilling Station</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">		
</head>
<body>
	<!-- Navigation Bar -->
	<div class="topnav" id="myTopnav">
		<?php 
		if(isset($_SESSION['user_id'])){
			echo '<a class="active" href="Home.php"><i class="fa fa-fw fa-home"></i>Home</a>';
			echo '<a href="Services.php"><i class="fa fa-fw fa-tint"></i>Services</a>';
			echo '<a href="#"><i class="fa fa-fw fa-info"></i>Order Details</a>';
			echo '<a href="About Us.php"><i class="fa fa-fw fa-users"></i>About Us</a>';
			echo '<a href="#signin"><i class="fa fa-fw fa-user"></i><span id="login-text">'.$_SESSION['user_name'].'</span></a>';
			echo '<a href="../functions/logout.php">Logout</a>';
		}
		?>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
	</div>
	<!-- Content -->
	<div class="content" id="p">
    <img src="../assets/logo.png" class="mylogo" alt="ourlogo">
	<h3>"Refresh your body, refresh your life - quench your thirst with our pure and affordable water."</h3>
	<h4>At ReWater, we believe that access to clean and safe drinking water is a fundamental 
      human right. That's why we're committed to providing our customers with the highest quality water at affordable 
      prices. Our state-of-the-art water purification systems use a combination of technologies to remove impurities, 
      chemicals, and other contaminants that may be present in tap water. We regularly test our water to ensure that it 
      meets or exceeds all relevant quality standards. Our friendly and knowledgeable staff is always on hand to answer 
      any questions you may have and help you select the best water for your needs. We offer a range of water products, 
      including alkaline water, purified water, and mineral water, in various sizes and containers to suit your 
      preferences. Whether you're looking for water for your home, office, or special event, we've got you covered. Plus, 
      with our convenient refill options, you can reduce plastic waste and do your part for the environment. Visit us 
      today and experience the difference that clean and refreshing water can make in your life!
	</h4>
	</div>

	<!-- Footer -->
	<div class="footer">
		<p>&copy; 2023 All Rights Reserved.</p>
	</div>

</body>
</html>