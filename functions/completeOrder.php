<?php 
include 'config.php';
date_default_timezone_set('Asia/Manila');
$order_ID = $_POST['order_id'];
$order = $_POST['order'];
$user_ID = $_POST['user_id'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$time = date("g:iA");
$notification_header = "Order Delivered";
$notification_message = "Your $order order of $quantity piece(s) for ₱$price is delivered";
$sql = "UPDATE `order_tbl` SET `status` = 'completed', `date_delivered` =  CURDATE() WHERE `order_id` = '$order_ID' ";
$notif = "INSERT INTO `notification`(`user_id`, `header`, `message`,`time`) VALUES ('$user_ID','$notification_header','$notification_message', '$time')";
mysqli_query($conn,$notif);
mysqli_query($conn,$sql);
?>