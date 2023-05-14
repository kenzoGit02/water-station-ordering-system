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
        echo "<div class='card d-flex flex-row mb-2'>
                <img class='card-img-top' src='assets/".$order.".png' style='width:30%'>
                <div class='card-body p-0'>
                    <div class='container-fluid'>
                        <div class='row'>
                            <div class='col-sm-8'>
                                <p class='my-0 my-sm-2 my-md-4 my-lg-1'>
                                ".$row['order']."
                                </p>
                            </div>
                            <div class='col-sm-4'>
                                <p class='my-0 my-sm-2 my-md-4 my-lg-1'>
                                <span class='text-muted'>Quantity: </span>".$row['quantity']."
                                </p>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-5'>
                                <p class='my-0 my-sm-2 my-md-4 my-lg-1'>
                                <span class='text-muted'>To Pay: </span>₱".$row['price']."
                                </p>
                            </div>
                            <div class='col-sm-7'>
                                <p class='my-0 my-sm-2 my-md-4 my-lg-1'>
                                    <span class='text-muted'>Ordered: </span>".$row['date_ordered']."
                                </p>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-12 text-right'>
                                <button class='btn btn-primary mb-1 mt-0 mt-sm-3 mt-md-5 mt-lg-5' onclick='cancel(".$row['order_id'].")'>Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
    }
}
else
{
    echo "<p class='text-center''>No Pending Orders</p>";
}
?>