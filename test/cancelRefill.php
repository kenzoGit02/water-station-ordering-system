<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "waterstation_db";

$conn = mysqli_connect($servername,$username,$password,$dbname);

$sql = "UPDATE refill_requests SET requesting='0' WHERE id = '1';";
$result = mysqli_query($conn, $sql);
?>