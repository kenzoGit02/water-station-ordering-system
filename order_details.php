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
                <li class="nav-item">
                    <a class="nav-link px-2 py-3" href="Services.php"><i class="fa fa-fw fa-tint"></i>Buy</a>
                </li>
                <li class="nav-item active">
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

    <!-- Main -->
    <main class="container-fluid">
        <div class="row">
            <!-- Pending Orders -->
            <div class="col-sm-12 col-md-12 col-lg-6" >
                <h1 class="text-center">
                    PENDING
                </h1>
                <div class="container-fluid" id="pending-card-container">
                </div>
                

            </div>
            <!-- Received Orders -->
            <div class="col-sm-12 col-md-12 col-lg-6" >
                <h1 class="text-center">
                    RECEIVED
                </h1>
                <div class="container-fluid" id="received-card-container">
                </div>
            </div>
        </div>
    </main>
    
    <!-- Footer -->
	<div class="footer">
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
    
    function getPending(){
        $.ajax({
            type:'GET',
            url:'functions/getPendingOrder.php',
            success: function(response){
                $("#pending-card-container").html(response);
            }
        });
    }
    function getReceived(){
        $.ajax({
            type:'GET',
            url:'functions/getReceivedOrder.php',
            success: function(response){
                $("#received-card-container").html(response);
            }
        });
    }
    function cancel(OrderID){
        Swal.fire({
            title: 'Are you sure you wanted to cancel your order?',
            icon: 'info',
            confirmButtonText:'Confirm',
            showCancelButton:'true'
        }).then((result) => {
            if(result.isConfirmed){
                $.ajax({
                    type:'POST',
                    url:'functions/cancelOrder.php',
                    data:{
                        orderID : OrderID
                    },
                    success: function(){
                        Swal.fire('Order Cancelled','','success');
                        getPending();
                    }
                });
            }
        })
        
    }
    getPending();
    getReceived();
</script>
</html>