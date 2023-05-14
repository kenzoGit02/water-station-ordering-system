<?php 
date_default_timezone_set('Asia/Manila');
echo date("l jS \of F Y h:i:s A");
echo "<br/>l :";
echo date("l");
echo "<br/>jS :";
echo date("jS");
echo "<br/>\of :";
echo date("\of");
echo "<br/>F :";
echo date("F");
echo "<br/>Y :";
echo date("Y");
echo "<br/>h:i:s :";
echo date("h:i:s");
echo "<br/>A :";
echo date("A");
echo "<br/>N :";
if(date("N") == 7){
    echo "it is sunday";
}
else{
    echo "not sunday";
}
echo date("F");
echo date("jS", strtotime("0000-00-2"));
echo "<br/>Y-m-j :";
echo date("Y-m-j");
echo "<br/>g:iA :";
echo date("g:iA");


if(isset($_POST['button'])){
    echo $_POST['text'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get">
        <input type="text" name="text">
        <button type="submit" name="button">TAP ME</button>
    </form>
</body>
</html>