<?php
include 'config.php';


$status = 'pending';
$orderID = $_POST['orderID'];
$sql = "UPDATE `order_tbl` SET `status`='cancelled' WHERE `order_id`='$orderID' && `status` = '$status'";
mysqli_query($conn, $sql);
?>