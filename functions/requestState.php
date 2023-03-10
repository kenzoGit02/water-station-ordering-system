<?php 

@include 'config.php';

$user_id = $_POST['id'];

$sql = "SELECT requesting FROM user_form WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo $row['requesting'];
    }
}else{
    echo "There are no refill request";
}
?>
