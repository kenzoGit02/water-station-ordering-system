<?php 

@include 'config.php';

$user_id = $_POST['id'];
$sql = "UPDATE user_form SET requesting='0' WHERE user_id = '$user_id';";
$result = mysqli_query($conn, $sql);

?>