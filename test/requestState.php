<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "waterstation_db";

$conn = mysqli_connect($servername,$username,$password,$dbname);

$sql = "SELECT requesting FROM refill_requests";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo $row['requesting'];
    }
}else{
    echo "There are no refill request";
}
?>
