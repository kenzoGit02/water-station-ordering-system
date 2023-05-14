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
        echo "<div class='card d-flex flex-row mb-2'>
                <img class='card-img-top' src='assets/".$order.".png' style='width:30%'>
                <div class='card-body p-0'>
                    <div class='container-fluid'>
                        <div class='row'>
                            <div class='col-sm-8'>
                                <p class='my-0 my-sm-3 my-md-4 my-lg-2'>
                                ".$row['order']."
                                </p>
                            </div>
                            <div class='col-sm-4'>
                                <p class='my-0 my-sm-3 my-md-4 my-lg-2'>
                                <span class='text-muted'>Quantity: </span>".$row['quantity']."
                                </p>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-5'>
                                <p class='my-0 my-sm-3 my-md-4 my-lg-2'>
                                <span class='text-muted'>Price Paid: </span>₱".$row['price']."
                                </p>
                            </div>
                            <div class='col-sm-7'>
                                <p class='my-0 my-sm-3 my-md-4 my-lg-2'>
                                    <span class='text-muted'>Ordered: </span>".$row['date_ordered']."
                                </p>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-8 col-sm-6'>
                                <p class='my-0 my-sm-3 my-md-4 my-lg-2'>
                                    <span class='text-muted'>Delivered: </span>".$row['date_delivered']."
                                </p>
                            </div>
                            <div class='col-sm-4'>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
    }
}
else
{
    echo "<p style='text-align:center;'>No Received Orders</p>";
}
?>