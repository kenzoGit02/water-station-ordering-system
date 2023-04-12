<?php
include 'config.php';
session_start();
$sessionID = $_SESSION['user_id'];
$sql = "SELECT * FROM order_tbl WHERE `user_id` = '$sessionID' AND `status` = 'pending' AND `order` != 'refill'";
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
                <div id='pending-details-bar'>
                    <div id='pending-details-bar-name'>".$row['order']."</div>
                    <div id='pending-details-bar-qty'>Quantity: ".$row['quantity']."</div>
                    <div id='pending-details-bar-prc'>Price to Pay: ₱".$row['price']."</div>
                    <div id='pending-details-bar-do'>Date Ordered: ".$row['date_ordered']."</div>
                </div>
            </div>";
    }
}
else
{
    echo "No Pending Orders";
}
?>