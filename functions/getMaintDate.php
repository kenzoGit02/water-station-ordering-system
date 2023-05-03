<?php 
include 'config.php';

$sql = "SELECT `date` FROM `maintenance_date` WHERE `id` = 2 ";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $date = $row['date'];
        echo date("jS", strtotime("0000-00-$date"));
        echo " of ";
        echo date("F");
    }
}
?>
