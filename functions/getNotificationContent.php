<?php 
include 'config.php';
session_start();
$user_ID = $_SESSION['user_id'];
$notif_ID = $_POST['notif_id'];
$sql = "SELECT * FROM `notification` WHERE `notification_id` = '$notif_ID' AND `user_id` = '$user_ID'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)){
    if($row = mysqli_fetch_assoc($result)){
        $json_data['header'] = $row['header'];
        $json_data['message'] = $row['message'];
        $json_data['date'] = $row['date'];
        $json_data['time'] = $row['time'];
        echo json_encode($json_data);
    }
}
?>