<?php 
include 'config.php';

$userID = $_POST['userID'];
$status = 'pending';
$sql = "UPDATE `order_tbl` SET `status`='cancelled' WHERE `user_id`='$userID' && `status` = '$status' && `order` = 'Refill'";
mysqli_query($conn, $sql);
?>