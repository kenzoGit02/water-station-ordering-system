<?php 
include 'config.php';
session_start();

$userID = $_SESSION['user_id'];
$status = 'pending';
$sql = "UPDATE `order_tbl` SET `status`='cancelled' WHERE `user_id`='$userID' && `status` = '$status' && `order` = 'Refill'";
mysqli_query($conn, $sql);
?>