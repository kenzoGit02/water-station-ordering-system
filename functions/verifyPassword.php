<?php 
include 'config.php';
session_start();

$sessionID = $_SESSION['user_id'];
$inputPass = md5($_POST['password']);
$sql = "SELECT `password` FROM `user_form` WHERE `password`= '$inputPass' AND `user_id` = '$sessionID'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    echo "Verified";
}
?>