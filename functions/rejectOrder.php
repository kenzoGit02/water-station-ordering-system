<?php
include 'config.php';
function UserID(){
    include 'config.php';
    $order_ID = $_POST['order_id'];
    $sql = "SELECT user_id FROM order_tbl WHERE order_id = '$order_ID'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row["user_id"];
}
$user_ID = UserID();
$notification_header = "Order Rejected";
$order_ID = $_POST['order_id'];
$message = $_POST['message'];
$time = date("g:iA");
$sql = "UPDATE `order_tbl` SET `status`= 'rejected' WHERE `order_id` = '$order_ID '";
$notif = "INSERT INTO `notification`(`user_id`, `header`, `message`,`time`) VALUES ('$user_ID','$notification_header','$message', '$time')";

mysqli_query($conn,$sql);
mysqli_query($conn,$notif);
?>