<?php 
include 'config.php';
date_default_timezone_set('Asia/Singapore');
$order_ID = $_POST['order_id'];
$completeDate = date('F d Y');
$sql = "UPDATE `order_tbl` SET `status` = 'completed', `date_delivered` = '$completeDate' WHERE `order_id` = '$order_ID' ";
$result = mysqli_query($conn,$sql);
?>