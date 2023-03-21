<?php

@include '../functions/config.php';
session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_admin.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/Home.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
	<!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" 
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" 
    crossorigin="anonymous"></script>
    <!-- jquery cdn -->
	<script src="../script/script.js"></script>
	<title>Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
body{
    background-repeat: no-repeat;
    background-attachment: fixed;
}
#table{
    margin:auto;
}
th, td{
    border:1px solid black;
    width:30vw;
    padding:15px 10px;
}
#action{
    text-align:center;
}
#button-confirm{
    padding: 10px 20px;
}
</style>
</head>
<body>
<!-- nav bar -->
<div class="topnav" id="myTopnav">
<?php 
if(isset($_SESSION['admin_name'])){
   echo '<a class="active" href="admin_page.php"><i class="fa fa-fw fa-users"></i>Accounts</a>';
   echo '<a href="admin_rfll_request.php"><i class="fa fa-fw fa-tint"></i>Refills</a>';
   echo '<a href="orders_page.php"><i class="fa fa-fw fa-tint"></i>Orders</a>';
   echo '<a href="#signin"><i class="fa fa-fw fa-user"></i><span id="login-text">'.$_SESSION['admin_name'].'</span></a>';
   echo '<a href="../functions/logout_admin.php">Logout</a>';
}
?>
<a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<!-- orders table -->
<table id="table">
    <tr>
        <th colspan="6"><h1>Orders</h1></th>
    </tr>
    <tr>
        <th>Name</th>
        <th>Address</th>
        <th>Order</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Delivered & Paid</th>
    </tr>
    <tbody id='table-body'></tbody>
</table>
<script>
    function finishOrder(id){
        $.ajax({
        type:'POST',
        url:'../functions/completeOrder.php',
        data:{
            order_id: id
        }
        })
    }
    $(document).ready(function(){
    $.ajax({
        type:'GET',
        url:'../functions/getOrders.php',
        success: function(response){
           $("#table-body").html(response);
        }
    });
      setInterval(() => {
         $.ajax({
         type:'GET',
         url:'../functions/getOrders.php',
         success: function(response){
            $("#table-body").html(response);
         }
         });
      }, 1000);
   });
</script>
</body>
</html>