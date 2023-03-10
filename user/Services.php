<!DOCTYPE html>
<head>
	<link rel="stylesheet" href="../css/Home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<script src="../script/script.js"></script>
	<title>Water Refilling Station</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">		
	<script src="https://code.jquery.com/jquery-3.6.3.min.js" 
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" 
    crossorigin="anonymous"></script>
	
<style>
*{
	box-sizing: border-box;
}
body{
  min-height: 100vh;
}
#footer-service{
	position:sticky;
	top:100%;
	background-image: linear-gradient(45deg,#88E3FF, #F0FFFF);
	padding: 20px;
	text-align: center;
	font-family: 'Proxima Nova', Arial, Helvetica, sans-serif;
}
#content{
	display: flex;
	width: 100%;
	justify-content:space-around;
}
.card{
	max-width: 40%;
	min-width: 20%;
	padding: 10px;
	background-color: rgb(250, 250, 250, 0.4);
	display:flex;
	flex-direction: column;
	align-items:center;
	border-radius:10px;
	margin-bottom:20px;
}
.item-name{
	margin:0;
	margin-bottom:20px;
}
img{
  width: 200px;
  height: 200px;
  margin-bottom:20px;
}
.buy{
	padding:10px;
}

/* Show menu when hamburger is clicked */
@media screen and (max-width: 600px) {
  h3 #gallon #slim {
      background-color: #79bfe2;
  }
  .h3.responsive a {
      float: none;
      display: block;
      text-align: left;
	  color:red;
  }
}
/* Add responsiveness - will automatically display the navbar vertically instead of horizontally on screens less than 500 pixels */
@media screen and (max-width: 500px) {
  h3 #gallon #slim  {
    float: none;
    display: block;
  }
}
#content2{
	text-align:center;
}
#refill-header{
	margin:0;
	margin-bottom: 20px;
}
#refill-button{
	font-size:20px;
	font-weight: 700;
	padding:20px 50px;
	font-family: 'Proxima Nova', Arial, Helvetica, sans-serif;
}
</style>
</head>
<body>
	<!-- Navigation Bar -->
	<div class="topnav" id="myTopnav">
		<?php 
		session_start();
		if(isset($_SESSION['user_id'])){
			echo '<a class="active" href="Home.php"><i class="fa fa-fw fa-home"></i>Home</a>';
			echo '<a href="Services.php"><i class="fa fa-fw fa-tint"></i>Services</a>';
			echo '<a href="About Us.php"><i class="fa fa-fw fa-info"></i>About Us</a>';
			echo '<a href="#signin"><i class="fa fa-fw fa-user"></i><span id="login-text">'.$_SESSION['user_name'].'</span></a>';
			echo '<a href="../functions/logout.php">logout</a>';
		}
		?>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
	</div>
	<!-- Content -->
	<div id="content">
		<div id="gallon" class="card">
			<h1 class="item-name">Round Water Container</h1>
			<img src="../assets/gallon.png">
			<button class="buy">BUY</button>
		</div>
		<div id="slim" class="card">
			<h1 class="item-name">Slim Water Container</h1>
			<img src="../assets/slim.png">
			<button class="buy">BUY</button>
		</div>
	</div>
	<div id="content2">
		<h1 id="refill-header">Ready to ask for a refill?</h1>
		<button id="refill-button"><span id="text">REFILL</span></button>
	</div>

<!-- Footer -->
<div id="footer-service">
	<p>&copy; 2023 All Rights Reservedd.</p>
</div>
</body>
	<script>
		$(document).ready(function(){
            var RequestingRefill = false;
			var session = <?php echo $_SESSION['user_id'] ?>;
            $.ajax({
                type:'POST',
                url:'../functions/requestState.php',
				data: {
					id: session
				},
                success: function(data){
                    if(data == 1){
                        // $("#refill-button").css('color','red');
                        $("#text").text('CANCEL');
                        RequestingRefill = true;
                        console.log('request refill');
                    }
                    else{
                        // $("#refill-button").css('color','green');
                        $("#text").text('REFILL');
                        RequestingRefill = false;
                        console.log('not requesting refill');
                    }
                }
            });
            
            $("#refill-button").click(function(){
                if(RequestingRefill == false){
                    $("#text").text('CANCEL');
                    RequestingRefill = true;
					$.ajax({
					type:'POST',
					data: {
						id: session
					},
					url:'../functions/requestRefill.php'
					});
                }
                else
                {
                    $("#text").text('REFILL');
                    RequestingRefill = false;
                    console.log('not requesting refill');
					$.ajax({
					type:'POST',
					data: {
						id: session
					},
					url:'../functions/cancelRefill.php'
					});
                }
            });
        });
	</script>
</html>