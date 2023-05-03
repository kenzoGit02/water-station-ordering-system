<?php 
@include 'config.php';
$sql = "SELECT * FROM user_form;";
$result = mysqli_query($conn,$sql);
// $array[] = mysqli_fetch_array($result);
if(mysqli_num_rows($result) > 0){
    while($row=mysqli_fetch_assoc($result)){
        echo "<tr id='row'>";
        echo "<th id='user-id" . $row['user_id'] . "' scope='row'>" . $row['user_id'] . "</th>";
        echo "<td id='name" . $row['user_id'] . "'>" . $row['name'] . "</td>";
        echo "<td id='email" . $row['user_id'] . "'>" . $row['email'] . "</td>";
        echo "<td id='address" . $row['user_id'] . "' class='text-wrap'>" . $row['address'] . "</td>";
        echo "<td id='action'><button class='btn btn-sm btn-primary m-1'id='button-edit' onclick='userEdit(" . $row['user_id'] . ")' data-toggle='modal' data-target='#editModal'>Edit</button><button class='btn btn-sm btn-danger'id='button-delete' onclick='userDelete(" . $row['user_id'] . ")' data-toggle='modal' data-target='#deleteModal'>Delete</button</td>";
        echo "</tr>";
    }
}
else
{
    echo "<tr id='row'>";
    echo "<td class='text-center' colspan = '3'> There are no requests</td>";
    echo "</tr>";
}
?>