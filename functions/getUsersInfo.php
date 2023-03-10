<?php 
@include 'config.php';
$sql = "SELECT * FROM user_form;";
$result = mysqli_query($conn,$sql);
$array[] = mysqli_fetch_array($result);
if(mysqli_num_rows($result) > 0){
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr id='row'>";
        echo "<td id='name'>" . $row['user_id'] . "</td>";
        echo "<td id='name'>" . $row['name'] . "</td>";
        echo "<td id='name'>" . $row['email'] . "</td>";
        echo "<td id='address'>" . $row['address'] . "</td>";
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