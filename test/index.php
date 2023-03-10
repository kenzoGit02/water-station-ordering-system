<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" 
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" 
    crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            var Name = "Kenzo";
            var Address = "Address";
            var Type = "Slim";
            var Quantity = 1;
            $("#refill").click(function(){
                $.post("requestRefill.php", {
                    name : Name,
                    address : Address,
                    type : Type,
                    quantity : Quantity
                }, function(data,status){
                    $("#list").html(status);
                });
            });

            $("#refresh").click(function(){
                $.ajax({
                    type: 'GET',
                    url: 'refillList.php',
                    success: function(data){
                        $("#callback").html(data);
                    }
                });
            });
        });
    </script>
    <title>Document</title>
</head>
<body>
    <button id="refill">Refill</button>
    <p id="list"></p>
    <button id="refresh">Refresh</button>
    <p id="callback"></p>
</body>
</html>