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
	<!-- fontawesomecdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- fontawesomecdn -->
    <!-- bootstrapcdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- bootstrapcdn -->
    <link rel="stylesheet" href="css/Home.css">
	<!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" 
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" 
    crossorigin="anonymous"></script>
    <!-- jquery cdn -->
    <title>ReWater</title>
</head>
<body>
	<!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand font-weight-bold" href="#">ReWater</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link px-2 py-3" href="Home.php"><i class="fa fa-fw fa-home"></i>Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2 py-3" href="Services.php"><i class="fa fa-fw fa-tint"></i>Buy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2 py-3" href="order_details.php"><i class="fa fa-fw fa-info"></i>Order Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2 py-3" href="about_us.php"><i class="fa fa-fw fa-users"></i>About Us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle px-2 py-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-bell"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link px-2 py-3" href="user_profile.php"><i class="fa fa-fw fa-user"></i><span id="login-text"><?php echo $_SESSION['user_name']?></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link px-2 py-3" href="functions/logout.php"><i class="fa fa-fw fa-right-to-bracket"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>

	<!-- Content -->
    <main class="container mt-2">
        <div class="row">
            <div class="col-md">
                <h1 class="text-center">
                "Refresh your body, refresh your life - quench your thirst with our pure and affordable water."
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <h3>
                    
                </h3>
                <p>
                    We provide safe and clean drinking water to our customers.
                </p>
                <h3>
                    What services do we offer?
                </h3>
                <p>
                    At our water refilling station, we are committed to providing our customers with the best 
                    possible experience. To achieve this, we offer a range of services that cater to the diverse needs 
                    and preferences of our customers. Our online ordering and delivery services make it easy for customers 
                    to place orders from the comfort of their homes and have their water delivered to their doorstep. 
                </p>
            </div>
        </div>
    </main>

	<!-- Footer -->
	<div class="footer">
		<p>&copy; 2023 All Rights Reserved.</p>
	</div>
</body>
</html>