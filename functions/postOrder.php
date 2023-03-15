<?php 
@include 'config.php';
date_default_timezone_set('Asia/Singapore');
echo $order = $_POST['order'];
echo $name = $_POST['name'];
echo $address = $_POST['address'];
echo $userID = $_POST['userID'];
echo $quantity = $_POST['quantity'];
echo $date = date('F d Y');
echo $status = 'pending';
$sql = "INSERT INTO order_tbl (user_id, `order`, quantity, date_ordered, status) VALUES ('$userID', '$order', '$quantity', '$date','$status')";
mysqli_query($conn, $sql);
?>