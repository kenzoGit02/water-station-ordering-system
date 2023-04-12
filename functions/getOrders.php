<?php 
include 'config.php';
$sql = "SELECT order_id,`name`, `address`, `order`, `quantity`, `price` FROM user_form, order_tbl WHERE user_form.user_id = order_tbl.user_id AND `status` = 'pending' AND `order` != 'Refill';";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr id='row'>";
        echo "<input type='hidden' value='".$row['order_id']."'>";
        echo "<td id='name'>" . $row['name'] . "</td>";
        echo "<td id='address'>" . $row['address'] . "</td>";
        echo "<td id='order'>" . $row['order'] . "</td>";
        echo "<td id='quantity'>" . $row['quantity'] . "</td>";
        echo "<td id='price'>₱" . $row['price'] . "</td>";
        echo "<td id='action'><button id='button-confirm' onclick='finishOrder(".$row['order_id'].")'>Confirm</button></td>";
        echo "</tr>";
    }
}
else
{
    echo "<tr id='row'>";
    echo "<td style = 'text-align:center;'colspan = '6'>There are no orders</td>";
    echo "</tr>";
}
?>