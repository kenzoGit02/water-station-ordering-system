<?php 
include 'config.php';
session_start();
$user_ID = $_SESSION['user_id'];

$sql = "SELECT * FROM `notification` WHERE `user_id` = '$user_ID' AND `read` = '0';";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo"<div class='dropdown-divider'></div>";
        echo"<a id= 'a'class='dropdown-item text-primary' data-toggle='modal' data-target='#exampleModal3' onclick='openModalNotification(".$row['notification_id'].")'>".$row['header']." <span class='text-sm text-muted'>".$row['time']."</span></a>";
    }
}
else{
    echo "<p class='text-muted text-center'>No notifications yet.</p>";
}
?>