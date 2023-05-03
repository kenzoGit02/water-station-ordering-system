<?php 
include 'config.php';

$date = $_POST["date"];

$sql = "UPDATE `maintenance_date` SET `date`= '$date' WHERE `id`= '2'";
mysqli_query($conn, $sql);

echo date("jS", strtotime("0000-00-$date"));
?>
