<?php 
@include 'config.php';
$sql = "SELECT * FROM user_form WHERE requesting = '1';";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result) > 0){
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr id='row'>";
        echo "<input type='hidden' value='".$row['user_id']."'>";
        echo "<td id='name'>" . $row['name'] . "</td>";
        echo "<td id='address'>" . $row['address'] . "</td>";
        echo "<td id='requesting'><button id='accept'>Confirm</button></td>";
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