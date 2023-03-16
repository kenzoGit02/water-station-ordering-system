<?php 
include 'config.php';
$userId = $_POST['userId'];
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$sql = "UPDATE user_form SET `name`='$name',`email`='$email',`address`='$address' WHERE `user_id` = '$userId'";
mysqli_query($conn,$sql);
echo ("Edit Successful");
?>