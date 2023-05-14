<?php 
include 'config.php';
$notif_ID = $_POST['notif_id'];
$sql = "UPDATE `notification` SET `read` = 1 WHERE `notification_id`= '$notif_ID'";
mysqli_query($conn,$sql);
?>