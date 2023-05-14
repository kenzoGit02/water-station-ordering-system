<?php 
include 'config.php';
$revenue;
$sql = "SELECT SUM(price) as price FROM order_tbl WHERE date_delivered >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND `order` != 'Refill';";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    if($row = mysqli_fetch_assoc($result)){
        $json_data['price'] = $row['price'];
        $json = json_encode($json_data);
    }
}
$sql2 = "SELECT SUM(quantity) as slim FROM order_tbl WHERE date_delivered >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND `order` = 'Slim Water Container';";
$result2 = mysqli_query($conn, $sql2);
if(mysqli_num_rows($result2) > 0){
    if($row = mysqli_fetch_assoc($result2)){
        $json_data['slim'] = $row['slim'];
        $json = json_encode($json_data);
    }
}
$sql3 = "SELECT SUM(quantity) as round FROM order_tbl WHERE date_delivered >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND `order` = 'Round Water Container';";
$result3 = mysqli_query($conn, $sql3);
if(mysqli_num_rows($result3) > 0){
    if($row = mysqli_fetch_assoc($result3)){
        $json_data['round'] = $row['round'];
        $json = json_encode($json_data);
    }
}
echo $json;
?>
