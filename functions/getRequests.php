<?php 
include 'config.php';
$sql = "SELECT `order_id`,order_tbl.user_id,`name`, `address`, `order`, `status`, `quantity`, `price` FROM user_form, order_tbl WHERE user_form.user_id = order_tbl.user_id && `status` = 'pending' && `order` = 'Refill';";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr id='row'>";
        echo "<input type='hidden' value='".$row['user_id']."'>";
        echo "<td id='name' scope='row'>" . $row['name'] . "</td>";
        echo "<td id='address'>" . $row['address'] . "</td>";
        echo "<td id='quantity'>" . $row['quantity'] . "</td>";
        echo "<td id='price'>₱" . $row['price'] . "</td>";
        echo "<td id='action' class='text-center'>
                <button class='btn btn-primary mx-auto' onclick='finishRequest(".$row['order_id'].",\"".$row['order']."\",".$row['user_id'].",".$row['quantity'].",".$row['price'].")'>
                    Confirm
                </button>
                <button class='btn btn-warning mx-auto' onclick='rejectForm(".$row['order_id'].",\"".$row['name']."\")'data-toggle='modal' data-target='#exampleModal'>
                    Reject
                </button>
            </td>";
        echo "</tr>";
        
    }
}
else
{
    echo "<tr id='row'>";
    echo "<td class='text-center' colspan = '5'> There are no requests</td>";
    echo "</tr>";
}
?>