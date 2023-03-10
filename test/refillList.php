<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "waterstation_db";

$conn = mysqli_connect($servername,$username,$password,$dbname);

$sql = "SELECT * FROM refill";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<p>";
            echo $row['Username'];
            echo $row['Address'];
            echo $row['Type'];
            echo $row['Quantity'];
            echo "</p>";
            echo "<br>";
        }
    }else{
        echo "There are no refill request";
    }
?>