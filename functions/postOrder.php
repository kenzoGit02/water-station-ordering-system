<?php 
include 'config.php';
session_start();
date_default_timezone_set('Asia/Singapore');

$userID = $_SESSION['user_id'];
$name = $_SESSION['user_name'];
$address = $_SESSION['user_address'];
$order = $_POST['order'];
$quantity = $_POST['quantity'];
$total = $_POST['total'];
$date = date('F d Y');
$status = 'pending';

$sql = "INSERT INTO order_tbl (user_id, `order`, quantity, date_ordered, status, price) VALUES ('$userID', '$order', '$quantity', '$date','$status', '$total')";
$result = mysqli_query($conn, $sql);
echo $result;
?>