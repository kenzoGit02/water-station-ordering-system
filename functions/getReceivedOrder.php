<?php
include 'config.php';
session_start();
$sessionID = $_SESSION['user_id'];
$sql = "SELECT * FROM order_tbl WHERE `user_id` = '$sessionID' AND `status` = 'completed' AND `order` != 'refill' ORDER BY `order_id` DESC";
$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        if($row['order'] == "Slim Water Container"){
            $order = "slim";
        }
        else
        {
            $order = "gallon";
        }
        echo "<div class='card'>
                <div class='card-img'>
                    <img src='../assets/".$order.".png'>
                </div>
                <div id='received-details-bar'>
                    <div id='received-details-bar-name'>".$row['order']."</div>
                    <div id='received-details-bar-qty'>Quantity: ".$row['quantity']."</div>
                    <div id='received-details-bar-prc'>Price Paid: ₱".$row['price']."</div>
                    <div id='received-details-bar-do'>Date Ordered: ".$row['date_ordered']."</div>
                    <div id='received-details-bar-dr'>Date Received: ".$row['date_delivered']."</div>
                </div>
            </div>";
    }
}
else
{
    echo "<p style='text-align:center;'>No Received Orders</p>";
}
?>