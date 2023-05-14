<?php 
include 'config.php';

$sql = "SELECT SUM(quantity) as count, SUM(price) as price FROM order_tbl WHERE date_delivered >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND `order` = 'Refill';";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    if($row = mysqli_fetch_assoc($result)){
        $json_data['price'] = $row['price'];
        $json_data['count'] = $row['count'];
        echo json_encode($json_data);
    }
}
?>
