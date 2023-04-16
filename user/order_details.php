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
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
  	<link rel="stylesheet" href="../css/Home.css">
  	<link rel="stylesheet" href="../css/order_details.css">
    <script src="../script/script.js"></script>
    <!-- SweetAlert2 cdn -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- SweetAlert2 cdn -->
    <!-- jquery cdn -->
	<script src="https://code.jquery.com/jquery-3.6.3.min.js" 
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" 
    crossorigin="anonymous"></script>
	<!-- jquery cdn -->
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
    <!-- Main -->
    <div id="wrapper">
        <!-- Pending Orders -->
        <div id="container-pending">
            <div id='pending-card-header'>
                <h1>PENDING</h1>
            </div>
            <div id="pending-card-container">
            </div>
        </div>
        <!-- Received Orders -->
        <div id="container-received" >
            <div id='received-card-header'>
                <h1>RECEIVED</h1>
            </div>
            <div id="received-card-container">
            </div>
        </div>
    </div>
    <!-- Footer -->
	<div class="footer">
		<p>&copy; 2023 All Rights Reserved.</p>
	</div>
</body>
<script>
    function getPending(){
        $.ajax({
            type:'GET',
            url:'../functions/getPendingOrder.php',
            success: function(response){
                $("#pending-card-container").html(response);
            }
        });
    }
    function getReceived(){
        $.ajax({
            type:'GET',
            url:'../functions/getReceivedOrder.php',
            success: function(response){
                $("#received-card-container").html(response);
            }
        });
    }
    function cancel(OrderID){
        $.ajax({
            type:'POST',
            url:'../functions/cancelOrder.php',
            data:{
                orderID : OrderID
            },
            success: function(){
                Swal.fire({
                    title: 'Order Cancelled',
                    icon: 'success'
                })
                getPending();
            }
        });
    }
    getPending();
    getReceived();
</script>
</html>