<?php 
include 'config.php';
$order_ID = $_POST['order_id'];
$sql = "UPDATE `order_tbl` SET `status` = 'completed' WHERE `order_id` = '$order_ID' ";
$result = mysqli_query($conn,$sql);
?>