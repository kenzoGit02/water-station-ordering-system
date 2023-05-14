<?php 
include 'config.php';

$sql = "SELECT `date` FROM `maintenance_date` WHERE `id` = 2 ";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $maint_date = $row['date'];
        $day_today = date("j");
        if($maint_date == $day_today){
            echo "1";
        }else{
            echo "0";
        }
    }
}
?>