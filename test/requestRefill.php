<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "waterstation_db";

$conn = mysqli_connect($servername,$username,$password,$dbname);

$sql = "UPDATE refill_requests SET requesting='1' WHERE id = '1';";
$result = mysqli_query($conn, $sql);

// if(isset($_POST['name'])){
//     $Username = $_POST['name'];
//     $Address = $_POST['address'];
//     $Type = $_POST['type'];
//     $Quantity = $_POST['quantity'];
    
//     $sql = "INSERT INTO refill(Username, Address, Type, Quantity) VALUES ('$Username','$Address','$Type','$Quantity');";
//     $result = mysqli_query($conn, $sql);
//     echo $result;
// }
// if(isset($_POST['name'])){
//     $Username = $_POST['name'];
//     $Address = $_POST['address'];
//     $Type = $_POST['type'];
//     $Quantity = $_POST['quantity'];
//     echo $Username;
//     echo $Address;
//     echo $Type;
//     echo $Quantity;
// }

?>