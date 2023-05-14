<?php 
include 'config.php';
session_start();

$sessionID = $_SESSION['user_id'];
$inputPass = md5($_POST['password']);
$sql = "UPDATE `user_form` SET `password`='$inputPass' WHERE `user_id` = '$sessionID'";
$result = mysqli_query($conn, $sql);
echo $result;
?>