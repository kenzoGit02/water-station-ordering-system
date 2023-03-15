<?php 
@include 'config.php';
$sql = "SELECT `order_id`,order_tbl.user_id,`name`, `address`, `status` FROM user_form, order_tbl WHERE user_form.user_id = order_tbl.user_id && `status` = 'pending' && `order` = 'Refill';";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr id='row'>";
        echo "<input type='hidden' value='".$row['user_id']."'>";
        echo "<td id='name'>" . $row['name'] . "</td>";
        echo "<td id='address'>" . $row['address'] . "</td>";
        echo "<td id='action'><button id='button-confirm' onclick='finishRequest(".$row['order_id'].")'>Confirm</button></td>";
        echo "</tr>";
    }
}
else
{
    echo "<tr id='row'>";
    echo "<td style = 'text-align:center;'colspan = '3'> There are no requests</td>";
    echo "</tr>";
}
?>