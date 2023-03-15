<?php 

@include 'config.php';

$user_id = $_POST['id'];

$sql = "SELECT status FROM order_tbl WHERE `order` = 'Refill' && user_id = '$user_id' && `status` = 'pending';";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        echo $row['status'];
    }
}
else
{
    echo 'none';
}
?>
