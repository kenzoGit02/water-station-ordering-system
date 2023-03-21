<?php 
	session_start();
?>
<!DOCTYPE html>
<head>
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<script src="../script/script.js"></script>
	<title>Water Refilling Station</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">		
	<!-- jquery cdn -->
	<script src="https://code.jquery.com/jquery-3.6.3.min.js" 
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" 
    crossorigin="anonymous"></script>
	<!-- jquery cdn -->
	<link rel="stylesheet" href="../css/Home.css">
	<link rel="stylesheet" href="../css/Services.css">
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

	<!-- JUGS -->
	<div id="product-container">
		<div id="gallon" class="card">
			<img src="../assets/gallon.png">
			<h1 class="item-name">Round Water Container</h1>
			<table>
				<tr>
					<td>
						<p class="price-label" >Price</p>
					</td>
					<td>
						<p id="price">₱170</p>
					</td>
				</tr>
				<tr>
					<td class="price-label" >Quantity</td>
					<td>
					<input type='number' class='input-number' id='quantity-round' onKeyDown="return false" value='1' min='1' name='quantity'>
					</td>
				</tr>
			</table>
			<button class="buy" onclick="show('Round Water Container','170')">Buy</button>
		</div>
		<div id="slim" class="card">
			<img src="../assets/slim.png">
			<h1 class="item-name">Slim Water Container</h1>
			<table>
				<tr>
					<td>
						<p class="price-label" >Price</p>
					</td>
					<td>
						<p id="price">₱150</p>
					</td>
				</tr>
				<tr>
					<td class="price-label" >Quantity</td>
					<td>
					<input type='number' class='input-number' id='quantity-slim' onKeyDown="return false" value='1' min='1' name='quantity'>
					</td>
				</tr>
			</table>
			<button class="buy" onclick="show('Slim Water Container','150')">Buy</button>
		</div>
	</div>
	<!-- REFILL -->
	<div id="service-refill">
		<div class="card">
			<h1 id="refill-header"><pre>   </pre></h1>
			<label for="jug" id='label-refill-quantity'>Jugs to be refilled:</label>
			<input type='number' name='jug' id='refill-quantity' class='input-number' onKeyDown="return false" value='0' min='0'>
			<button id="refill-button" onclick="show('Refill','50')"><span id="text"></span></button>
		</div>
	</div>

	<!-- Order Form -->
	<div id='cover' class='cover'>
		<form action='' method='POST' id='form'class='form'>
			<!-- close icon -->
			<i id='close'class="fa fa-2x fa-window-close"onclick='hide()'aria-hidden="true"></i>
			<h1 id='table-order-header'>Place Order</h1>
			<!-- input used to store session's user id value -->
			<input type="hidden" id="user_id"value="<?php echo $_SESSION['user_id']?>">
			<table id='table-order-details'>
				<tr>
					<th>Address</th>
					<td id='address'><?php echo $_SESSION['user_address']?></td>
				</tr>
				<tr>
					<th>Buyer</th>
					<td id='username'><?php echo $_SESSION['user_name']?></td>
				</tr>
				<tr>
					<th>Order</th>
					<td id='order'></td>
				</tr>
				<tr>
					<th>Payment Method</th>
					<td>Cash On Delivery</td>
				</tr>
				<tr>
					<th>Price</th>
					<td id='order-price'></td>
				</tr>
				<tr>
					<th>Quantity</th>
					<td id='order-quantity'></td>
				</tr>
				<tr>
					<td id='td-total-price'colspan='2' style='text-align:center'>
						<p>Total Price: ₱<span id='span-total-price'></span></p> 
					</td>
				</tr>
				<tr>
					<td colspan='2' style='text-align:center'>
						<button id='confirm-button' >Confirm</button>
					</td>
				</tr>
			</table>
		</form>
	</div>

	<!-- Footer -->
	<div id="footer-service">
		<p>&copy; 2023 All Rights Reservedd.</p>
	</div>

</body>
	<script>
		var session = <?php echo $_SESSION['user_id'] ?> // js variable for session id
		var RequestingRefill = false //initial value

		//function to check refill request state
		//if the user is requesting for refill already or not
		function requestState(){
			$.ajax({
				type:'POST',
				url:'../functions/requestState.php',
				data: {
					id: session
				},
				success: function(data){
					if(data == "pending")
					{
						$("#text").text('CANCEL');
						$("#refill-header").text('Cancel refill order?')
						$("#label-refill-quantity").css('display','none')
						$("#refill-quantity").css('display','none')
						RequestingRefill = true;
					}
					else
					{
						$("#text").text('REFILL')
						$("#refill-header").text('Ask for a refill?')
						$("#label-refill-quantity").css('display','block')
						$("#refill-quantity").css('display','block')
						RequestingRefill = false
					}
				}
        	})
		}

		requestState()
		//function to show order form
		function show(order,price){
			if(order == "Refill"){
				//if there is already a pending request, refill button will be for cancelling
				if(RequestingRefill == true)
				{
					// cancel order
					if (confirm("Are you sure you wanted to cancel your request?") == true) {
						let userID = $("#user_id").val()
						$.ajax({
							url:'../functions/cancelorder.php',
							type:'POST',
							data: {
								userID: userID,
							},
							success: function(){
								requestState()
							}
						})
						return
					}
				}
				// else
				// {
				// 	$("#cover").css('display','block')
				// 	$("#order").html(order)
				// 	$("#order-price").html(price)
				// }
				if($("#refill-quantity").val() > 0){
					let jugQuantity = $("#refill-quantity").val()
					let totalPrice = jugQuantity * price

					$("#order-quantity").html(jugQuantity)
					$("#cover").css('display','block')
					$("#order").html(order)
					$("#order-price").html(price)
					$("#span-total-price").html(totalPrice)
				}
				else
				{
					alert("No jugs to be refilled")
				}
			}
			else if(order =="Round Water Container")
			{
				let roundQuantity = $("#quantity-round").val()
				let totalPrice = roundQuantity * price
				$("#order-quantity").html(roundQuantity)
				$("#cover").css('display','block')
				$("#order").html(order)
				$("#order-price").html(price)
				$("#span-total-price").html(totalPrice) 

			}else if(order =="Slim Water Container"){
				let slimQuantity = $("#quantity-slim").val()
				let totalPrice = slimQuantity * price
				$("#order-quantity").html(slimQuantity)
				$("#cover").css('display','block')
				$("#order").html(order)
				$("#order-price").html(price) 
				$("#span-total-price").html(totalPrice) 
			}
		}

		//function to hide order form
		function hide(){
            $("#cover").css('display','none')
        }

		//function to issue order
		$('#form').submit(function(event){
            event.preventDefault()
			let order = $("#order").html()
			let name = $("#username").html()
			let address = $("#address").html()
			let userID = $("#user_id").val()
			let quantity = $("#order-quantity").html()
			let total = $("#span-total-price").html()
			$.ajax({
				url:'../functions/postOrder.php',
				type:'POST',
				data:{
					order: order,
					name: name,
					address: address,
					userID: userID,
					quantity: quantity,
					total: total
				},
				success:function(res){
					hide()
					requestState()
					//go to order details
				}
			})
        })

		// $("[type='number']").click(function(){
			
		// })
	</script>
</html>