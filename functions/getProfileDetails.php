<?php 
include 'config.php';
session_start();

$sessionID = $_SESSION['user_id'];

$sql = "SELECT * FROM `user_form` WHERE `user_id` = $sessionID ";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    if($row = mysqli_fetch_assoc($result)){
        $json_data['name'] = $row['name'];
        $json_data['email'] = $row['email'];
        $json_data['address'] = $row['address'];
        echo json_encode($json_data);
    }
}
else{
    echo "Error";
}
?>