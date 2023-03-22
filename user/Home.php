<?php 
	session_start();
	if(!isset($_SESSION['user_id'])){
		header('location:login_form.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/Home.css">
	<script src="../script/script.js"></script>
	<title>ReWater</title>
</head>
<body>
	<!-- Navigation Bar -->
	<div class="topnav" id="myTopnav">
        <a class="active" href="Home.php"><i class="fa fa-fw fa-home"></i>Home</a>
		<a href="Services.php"><i class="fa fa-fw fa-tint"></i>Services</a>
		<a href="order_details.php"><i class="fa fa-fw fa-info"></i>Order Details</a>
		<a href="about_us.php"><i class="fa fa-fw fa-users"></i>About Us</a>
		<a href="user_profile.php"><i class="fa fa-fw fa-user"></i><span id="login-text"><?php echo $_SESSION['user_name']?></span></a>
		<a href="../functions/logout.php">Logout</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
	</div>

	<!-- Content -->
	<div class="content" id="p">
		<h1>WELCOME TO OUR WEBSITE!</h1>
		<h3>"Refresh your body, refresh your life - quench your thirst with our pure and affordable water."</h3>
		<h4>We provide safe and clean drinking water to our customers. We have a wide variety of purified water options to choose from, and our state-of-the-art water refilling 
			technology ensures that our water is always fresh and healthy.</h4>
		<h3>What services do we offer?</h3>
		<h4>At our water refilling station, we are committed to providing our customers with the best 
            possible experience. To achieve this, we offer a range of services that cater to the diverse needs 
            and preferences of our customers. Our online ordering and delivery services make it easy for customers 
            to place orders from the comfort of their homes and have their water delivered to their doorstep. 
            We also provide detailed information on the quality of our water, including its source and any 
            treatment methods used, to ensure that our customers are confident in the safety and purity of our water. 
            Additionally, we encourage our customers to leave reviews and feedback on our website, allowing us to 
            continuously improve our services and better meet their needs. To stay connected with our customers and 
            reach out to new ones, we have integrated our website with social media platforms. Finally, we have 
            optimized our website for mobile devices to ensure that our customers can access our services on the go. 
            All of these services work together to provide a convenient and satisfying experience for our valued 
            customers.</h4>
	</div>

	<!-- Footer -->
	<div class="footer">
		<p>&copy; 2023 All Rights Reserved.</p>
	</div>
</body>
</html>