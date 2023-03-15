<?php
include 'config.php';

echo $userID = $_POST['userID'];
echo $status = 'pending';
$sql = "UPDATE `order_tbl` SET `status`='cancelled' WHERE `user_id`='$userID' && `status` = '$status'";
mysqli_query($conn, $sql);
?>