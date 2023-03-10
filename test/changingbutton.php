<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" 
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" 
    crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            var RequestingRefill = false;
            $.ajax({
                type:'GET',
                url:'requestState.php',
                success: function(data){
                    if(data == 1){
                        $("#refill").css('color','red');
                        $("#text").text('CANCEL');
                        RequestingRefill = true;
                        console.log('request refill');
                    }
                    else{
                        $("#refill").css('color','green');
                        $("#text").text('REFILL');
                        RequestingRefill = false;
                        console.log('not requesting refill');
                    }
                }
            });
            
            $("#refill").click(function(){
                if(RequestingRefill == false){
                    $(this).css('color','red');
                    $("#text").text('CANCEL');
                    RequestingRefill = true;
                    console.log('request refill');
                }
                else
                {
                    $(this).css('color','green');
                    $("#text").text('REFILL');
                    RequestingRefill = false;
                    console.log('not requesting refill');
                }
            });
            setInterval(function(){
                $("div").load("UpdateRequest.php").fadeIn("slow");
            },1000);
        });
    </script>
    <style>
        div{
            border:1px solid black;
            background-color: rgb(255, 255, 255);
            max-width: 600px;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <button id="refill"><span id="text">REFILL</span></button>
    <div></div>
    <p></p>
</body>
</html>