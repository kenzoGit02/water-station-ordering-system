<?php 
include 'config.php';
session_start();
$user_ID = $_SESSION['user_id'];

$query = "SELECT COUNT(user_id) AS count FROM `notification` WHERE `user_id` = '$user_ID' AND `read` = '0';";
$result2 = mysqli_query($conn,$query);
if(mysqli_num_rows($result2) > 0){
    if($row = mysqli_fetch_assoc($result2)){
        $json_data['count'] = $row['count'];
        echo json_encode($json_data);
    }
}

?>