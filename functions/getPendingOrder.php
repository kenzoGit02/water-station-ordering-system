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
                <div class='card-body'>
                    <div class='container-fluid'>
                        <div class='row'>
                            <div class='col-sm-8'>
                                <p>
                                ".$row['order']."
                                </p>
                            </div>
                            <div class='col-sm-4'>
                                <p>
                                <span class='text-muted'>Quantity: </span>".$row['quantity']."
                                </p>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-5'>
                                <p>
                                <span class='text-muted'>Price to Pay: </span>₱".$row['price']."
                                </p>
                            </div>
                            <div class='col-sm-7'>
                                <p>
                                    <span class='text-muted'>Date Ordered: </span>".$row['date_ordered']."
                                </p>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-sm-12 text-right'>
                                <button class='btn btn-primary' onclick='cancel(".$row['order_id'].")'>Cancel</button>
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