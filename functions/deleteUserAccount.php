<?php 
include 'config.php';
$userId = $_POST['userId'];
$sql = "DELETE FROM `user_form` WHERE `user_id` = '$userId'";
mysqli_query($conn,$sql);
?>