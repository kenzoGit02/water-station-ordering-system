<?php 
include 'config.php';
session_start();

$sessionID = $_SESSION['user_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];

$sql = "UPDATE `user_form` SET `name` = '$name', `email` = '$email', `address`= '$address' WHERE `user_id`= '$sessionID'";
$result = mysqli_query($conn, $sql);

$_SESSION['user_name'] = $name;
$_SESSION['user_email'] = $email;
$_SESSION['user_address'] = $address;
echo $result;
?>