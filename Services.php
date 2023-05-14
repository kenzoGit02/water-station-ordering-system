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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<!-- fontawesomecdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- fontawesomecdn -->
    <!-- bootstrapcdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- bootstrapcdn -->
    <!-- SweetAlert2 cdn -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- SweetAlert2 cdn -->
    <link rel="stylesheet" href="css/Home.css">
	<!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" 
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" 
    crossorigin="anonymous"></script>
    <!-- jquery cdn -->
    <title>ReWater</title>
</head>
<body>
	<!-- Merchandise Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Place Order</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<!-- BODY -->
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<h3 class="mx-auto" id="item-name">Item Name</h3>
					</div>
					<div class="row">
						<img src="#" alt="modal-image" class="rounded mx-auto" id="modal-img" style="height: 200px; width:200px;">
					</div>
					<div class="row">
						<div class="col-md">
							<h4 class="text-center">Buyer Details</h4>
							<hr>
						</div>
					</div>
					
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-4">
							<p class="text-secondary text-center font-weight-bold">Address</p>
						</div>
						<div class="col-sm-4">
							<p class="text-center"><?php echo $_SESSION['user_address']?></p>
						</div>
						<div class="col-sm-2"></div>
					</div>
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-4">
							<p class="text-secondary text-center font-weight-bold">Name</p>
						</div>
						<div class="col-sm-4">
							<p class="text-center"><?php echo $_SESSION['user_name']?></p>
						</div>
						<div class="col-sm-2"></div>
					</div>
					<div class="row mb-0">
						<div class="col-md">
							<h4 class="text-center">Order Summary</h4>
							<hr>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-4">
							<p class="text-secondary text-center font-weight-bold">Price</p>
						</div>
						<div class="col-sm-4">
							<p class="text-center" id="item-price">Details</p>
						</div>
						<div class="col-sm-2"></div>
					</div>
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-4">
							<p class="text-secondary text-center font-weight-bold">Quantity</p>
						</div>
						<div class="col-sm-4 d-flex justify-content-center">
							<input type='text' class='w-25 rounded' id='quantity' value='1' min='1' disabled>
							<button class="btn-primary btn-sm ml-3" onclick="addFunction()"><i class="fa fa-fw fa-arrow-up" ></i></button>
							<button class="btn-primary btn-sm ml-1" onclick="subtractFunction()"><i class="fa fa-fw fa-arrow-down" ></i></button>
						</div>
						<div class="col-sm-2"></div>
					</div>
					<div class="row">
						<div class="col-sm">
							<h3 class="text-danger">Total Order Price: <i class="fa fa-fw fa-peso-sign text-secondary"></i><span class="text-dark" id="order-total-price">VALUE</span></h3>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="confirmOrder()">Confirm Order</button>
			</div>
			</div>
		</div>
	</div>

	<!-- Refill Modal -->
	<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Refill</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<!-- BODY -->
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-md">
							<h4 class="text-center">Buyer Details</h4>
							<hr>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-4">
							<p class="text-secondary text-center font-weight-bold">Address</p>
						</div>
						<div class="col-sm-4">
							<p class="text-center"><?php echo $_SESSION['user_address']?></p>
						</div>
						<div class="col-sm-2"></div>
					</div>
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-4">
							<p class="text-secondary text-center font-weight-bold">Name</p>
						</div>
						<div class="col-sm-4">
							<p class="text-center"><?php echo $_SESSION['user_name']?></p>
						</div>
						<div class="col-sm-2"></div>
					</div>
					<div class="row mb-0">
						<div class="col-md">
							<h4 class="text-center">Order Summary</h4>
							<hr>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-4">
							<p class="text-secondary text-center font-weight-bold">Price</p>
						</div>
						<div class="col-sm-4">
							<p class="text-center"><i class="fa fa-fw fa-peso-sign"></i>
							<span id="refill-price">30</span>
							<span class="text-muted">(w/ delivery)</span></p>
						</div>
						<div class="col-sm-2"></div>
					</div>
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-4">
							<p class="text-secondary text-center font-weight-bold">Quantity</p>
						</div>
						<div class="col-sm-4 d-flex justify-content-center">
							<input type='number' class='w-25 rounded' id='refill-quantity' value='1' min='1'>
							<button class="btn-primary btn-sm ml-3" onclick="refillAddFunction()"><i class="fa fa-fw fa-arrow-up" ></i></button>
							<button class="btn-primary btn-sm ml-1" onclick="refillSubtractFunction()"><i class="fa fa-fw fa-arrow-down" ></i></button>
						</div>
						<div class="col-sm-2"></div>
					</div>
					<div class="row">
						<div class="col-sm">
							<h2 class="text-danger">Total Order Price: <i class="fa fa-fw fa-peso-sign text-secondary"></i><span class="text-dark" id="refill-total-price">VALUE</span></h2>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onclick="confirmRefillOrder()">Confirm Order</button>
			</div>
			</div>
		</div>
	</div>

	<!-- Notification Modal -->
	<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Notification</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<!-- BODY -->
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-md">
							<h4 class="" id="notification-header">Notification Header</h4>
							<p class="text-muted" id="notification-date">Notification Date</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<p id="notification-body">Notification Body</p>
						</div>
						<div class="col-md-1"></div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="read-button" onclick="">Confirm</button>
			</div>
			</div>
		</div>
	</div>

	<!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
		<a class="navbar-brand font-weight-bold" href="#">ReWater</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link px-2 py-3" href="Home.php"><i class="fa fa-fw fa-home"></i>Home<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
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
					<span class="badge badge-danger"id="notif-count">
					</span>
					</a>
					<div class="dropdown-menu" id="notif-dropdown" aria-labelledby="navbarDropdown">
						<!-- php div -->
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

	<!-- main content -->
	<main class="container my-5">
		<!-- merchandise row -->
		<div class="row">
			<div class="col-0 col-sm-0 col-md-2"></div>
			<div class="col-6 col-sm-6 col-md-4">
				<div class="card">
					<img src="assets/gallon.png" class="img rounded-top w-100 h-100">
					<h3 class="text-center">Round Water Container</h3>
					<div class="container">
						<div class="row">
							<div class="col-0 col-sm-3"></div>
							<div class="col-6 col-sm-3">
								<p class="text-center text-nowrap text-secondary font-weight-bold">Price</p>
							</div>
							<div class="col-6 col-sm-3">
								<p class="text-center text-nowrap font-weight-bold"><i class="fa fa-fw fa-peso-sign"></i>170</p>
							</div>
							<div class="col-0 col-sm-3"></div>
						</div>
						<div class="row">
							<div class="col-0 col-sm-3"></div>
							<div class="col-6 col-sm-3">
								<p class="text-center text-nowrap text-secondary font-weight-bold">Capacity</p>
							</div>
							<div class="col-6 col-sm-3">
								<p class="text-center text-nowrap">19 Liters</p>
							</div>
							<div class="col-0 col-sm-3"></div>
						</div>
					</div>
					<!-- Button trigger modal -->
					<button type="button" onclick="placeOrder('Round Water Container','170')" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">
						Buy
					</button>
				</div>
			</div>
			<div class="col-6 col-sm-6 col-md-4">
				<div class="card">
					<img src="assets/slim.png" class="img rounded-top w-100 h-100">
					<h3 class="text-center">Slim Water Container</h3>
					<div class="container">
						<div class="row">
							<div class="col-0 col-sm-3"></div>
							<div class="col-6 col-sm-3">
								<p class="text-center text-nowrap text-secondary font-weight-bold">Price</p>
							</div>
							<div class="col-6 col-sm-3">
								<p class="text-center text-nowrap font-weight-bold"><i class="fa fa-fw fa-peso-sign"></i>150</p>
							</div>
							<div class="col-0 col-sm-3"></div>
						</div>
						<div class="row">
							<div class="col-0 col-sm-3"></div>
							<div class="col-6 col-sm-3">
								<p class="text-center text-nowrap text-secondary font-weight-bold">Capacity</p>
							</div>
							<div class="col-6 col-sm-3">
								<p class="text-center text-nowrap">20 Liters</p>
							</div>
							<div class="col-0 col-sm-3"></div>
						</div>
					</div>
					<!-- Button trigger modal -->
					<button type="button" onclick="placeOrder('Slim Water Container','150')" class="btn btn-primary btn-block rounded-bottom" data-toggle="modal" data-target="#exampleModal">
						Buy
					</button>
				</div>
			</div>
			<div class="col-0 col-sm-0 col-md-2"></div>
		</div>
		<!-- refill row -->
		<div class="row mt-5">
			<div class="col-0 col-sm-0 col-md-2"></div>
			<div class="col-12 col-sm-12 col-md-8">
				<div class="card">
					<div class="card-header">
						<p class="card-text mb-0 text-muted" id="refill-text-header">Have empty jugs?</p>
					</div>
					<div class="card-body">
						<h5 class="text card-text text-size-lg" id="refill-text">Order a Refill here!</h5>
						<button type="button" id="button-refill" onclick="computeRefillTotalPrice()" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal2">
							Buy
						</button>
					</div>
					<div class="card-footer">
						<p class="text text-muted mb-0" id="refill-text-footer">
							The refill price for each jug is 30 pesos with delivery.
						</p>
					</div>
				</div>
			</div>
			<div class="col-0 col-sm-0 col-md-2"></div>
		</div>
	</main>

	<!-- Footer -->
	<div id="footer-service">
		<p>&copy; 2023 All Rights Reserved.</p>
	</div>
</body>
<script>
	function checkNotification(){
		$.ajax({
			type:'GET',
			url:'functions/getNotification.php',
			success: function(response){
				$("#notif-dropdown").html(response);
			}
		});
	}
	function getNotificationCount(){
		$.ajax({
			type:'GET',
			url:'functions/getNotificationCount.php',
			dataType: 'JSON',
			success: function(response){
				if(response.count == 0){
					$("#notif-count").css('display','none');
				}else{
					$("#notif-count").css('display','');
					$("#notif-count").html(response.count);
				}
			}
		});
	}
	getNotificationCount();
	checkNotification();
	setInterval(() => {
        checkNotification();
		getNotificationCount();
    }, 4000);
	function openModalNotification(notif_id){
		$.ajax({
			type:'POST',
			url:'functions/getNotificationContent.php',
			data:{
				notif_id : notif_id
			},
			dataType: 'JSON',
			success: function(res){
				$("#notification-header").html(res.header);
				$("#notification-body").html(res.message);
				$("#notification-date").html(res.date + " · " +res.time);
				$("#read-button").attr('onclick','readNotification('+ notif_id +')');
			}
		});
	}
	function readNotification(notif_id){
		$.ajax({
			type:'POST',
			url:'functions/readNotification.php',
			data:{
				notif_id : notif_id
			},
			success: function(){
				getNotificationCount();
				checkNotification();
			}
		});
	}
	function addFunction(){
		let quantty = $("#quantity").val();
		let num = parseInt(quantty, 10);
		$("#quantity").val(num + 1);
		computeTotalPrice();
	}
	function subtractFunction(){
		let quantty = $("#quantity").val();
		let num = parseInt(quantty, 10);
		if(quantty <= 1){
			return;
		}
		$("#quantity").val(num - 1);
		computeTotalPrice();
	}
	function computeTotalPrice(){
		var q = $("#quantity").val();
		var p = $("#item-price").html();
		$("#order-total-price").html(p * q);
	}
	function placeOrder(item_name, price){
		if(item_name == 'Round Water Container'){
			document.getElementById("modal-img").src = "assets/gallon.png";
		}else if(item_name == 'Slim Water Container'){
			document.getElementById("modal-img").src = "assets/slim.png";
		}
		$("#item-price").html(price);
		$("#item-name").html(item_name);
		computeTotalPrice();
	}
	function confirmOrder(){
		let order = $("#item-name").html();
		let quantity = $("#quantity").val();
		let total = $("#order-total-price").html();
		$.ajax({
			url:'functions/postOrder.php',
			type:'POST',
			data:{
				order: order,
				quantity: quantity,
				total: total
			},
			success: function(res){
				if(res == 1){
					Swal.fire({
						title: 'Success',
						text:'Your order is now pending and will be delivered to your address as soon as possible!',
						confirmButtonText: 'Order Details',
						icon: 'success'
					}).then((result) => {
						if(result.isConfirmed)
						{
							window.location.assign("order_details.php");
						}
						else{
							location.reload();
						}
					});
				}
				else{
					Swal.fire('Error','','error');
				}
			}
		});
	}
	function refillAddFunction(){
		let quantity = $("#refill-quantity").val();
		let num = parseInt(quantity, 10);
		$("#refill-quantity").val(num + 1);
		computeRefillTotalPrice();
	}

	function refillSubtractFunction(){
		let quantity = $("#refill-quantity").val();
		let num = parseInt(quantity, 10);
		if(quantity <= 1){
			return;
		}
		$("#refill-quantity").val(num - 1);
		computeRefillTotalPrice();
	}

	function computeRefillTotalPrice(){
		var q = $("#refill-quantity").val();
		var p = $("#refill-price").html();
		$("#refill-total-price").html(p * q);
	}
	function confirmRefillOrder(){
		let order = "Refill";
		let quantity = $("#refill-quantity").val();
		let total = $("#refill-total-price").html();
		$.ajax({
			url:'functions/postOrder.php',
			type:'POST',
			data:{
				order: order,
				quantity: quantity,
				total: total
			},
			success: function(res){
				if(res == 1){
					Swal.fire({
						title: 'Success',
						text:'Your refill request has been received. The collector will arrive as soon as possible!',
						icon: 'success'
					}).then(()=>{
						location.reload();
					})
				}
				else{
					Swal.fire('Error','','error');
				}
			}
		});
	}
	var session = <?php echo $_SESSION['user_id'] ?> // js variable for session id
	var RequestingRefill = false //initial value
	
	//function to check refill request state
	//if the user is requesting for refill already or not
	function requestState(){
			$.ajax({
				type:'POST',
				url:'functions/requestState.php',
				success: function(data){
					if(data == "pending")
					{
						let footer = "Please prepare the empty jugs. A collector will arrive at your address and collect them.";
						let body = "Cancel refill?";
						let header = "Your order is now pending";
						$("#button-refill").removeClass("btn-primary");
						$("#button-refill").addClass("btn-danger");
						$("#button-refill").html("Cancel");
						$("#refill-text-header").html(header);
						$("#refill-text").html(body);
						$("#refill-text-footer").html(footer);
						document.getElementById("button-refill").setAttribute('onclick','cancelRefill()');
						document.getElementById("button-refill").setAttribute('data-toggle',null);
						document.getElementById("button-refill").setAttribute('data-target',null);
						RequestingRefill = true;
					}
					else
					{
						let footer = "The refill price for each jug is 30 pesos with delivery.";
						let body = "Order a Refill here!";
						let header = "Have empty jugs?";
						$("#button-refill").removeClass("btn-danger");
						$("#button-refill").addClass("btn-primary");
						$("#button-refill").html("Buy");
						$("#refill-text-header").html(header);
						$("#refill-text").html(body);
						$("#refill-text-footer").html(footer);
						document.getElementById("button-refill").setAttribute('onclick','computeRefillTotalPrice()');
						document.getElementById("button-refill").setAttribute('data-toggle','modal');
						document.getElementById("button-refill").setAttribute('data-target','#exampleModal2');
						RequestingRefill = false;
					}
					// console.log("after condition onclick attribute :" + document.getElementById("button-refill").getAttribute("onclick"));
					// console.log("data-toggle attribute :" + document.getElementById("button-refill").getAttribute("data-toggle"));
					// console.log("data-target attribute :" + document.getElementById("button-refill").getAttribute("data-target"));
					// console.log("Requesting Refill :" + RequestingRefill);
				}
        	})
	}
	function cancelRefill(){
		Swal.fire({
			title:'Are you sure you wanted to cancel your order?',
			confirmButtonText: 'Yes',
			showDenyButton: 'Yes',
			icon:'warning'
		}).then((result) => {
			if(result.isConfirmed){
				$.ajax({
					url:'functions/cancelRefill.php',
					type:'POST',
					success: function(){
						requestState();
					}
				});
			}
		});
	}
	requestState();
	setInterval(() => {
        requestState();
    }, 2000);
</script>
</html>