<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">		
	<script src="https://code.jquery.com/jquery-3.6.3.min.js" 
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" 
    crossorigin="anonymous"></script>
    <title>Document</title>
    
</head>
<style>
    *{
        margin:0;
        padding:0;
        box-sizing: border-box;
        background: rgba(51, 170, 51, .1);
    }
    body{
        display: flex;
        height:100vh;
        align-items: center;
        justify-content: center;
        position:relative;
    }
    .form{
        border:1px solid black;
        position:absolute;
        top:50%;
        left:50%;
        transform:translate(-50%, -50%);
        width:500px;
        height:200px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    h1{
        margin:0;
        padding:0;
        width: 200px;
        border:1px solid black;
        text-align:center;
    }
    button{
        padding:10px 15px;
    }
    #absolute{
        position:absolute;
        top:0%;
        left:0%;
        padding:10px;
    }
    .cover{
        height:100vh;
        width:100%;
        background: rgba(0, 0, 0, .1);
        position:absolute;
        top:50%;
        left:50%;
        transform:translate(-50%, -50%);
        visibility: visible;
        z-index: 1;
    }
    .show-form{
        visibility: visible;
        z-index: 1;
    }
</style>
<body>
<script>
    function doThis(){
        $.ajax({
            url:'dummy.php',
            type:'POST',
            data:{action: 'call'},
            success: function(data){
                $("#div").html(data);
            }
        })
        
    }
</script>
<button onclick="doThis()">HELLO</button>
<div id="div"></div>




    <button id="absolute" onclick="myFunction()">ALERT</button>
    <button onclick="show()">Refill</button>
    <div id="cover" class="cover" onclick="cancelForm()">
        <form action="#" method="post" id="form"class="form">
            <h1>Place Order</h1>
            <table>
                <tr>
                    <th>Order</th>
                    <td>Placholder</td>
                </tr>
                <tr>
                    <th>Payment Method</th>
                    <td>Cash On Delivery</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>Placeholder</td>
                </tr>
                <tr>
                    <th>Quantity</th>
                    <td>
                        <input type="number" value="1" min="1" name="quantity" id="">
                    </td>
                </tr>
                <tr>
                    <td colspan='2' style="text-align:center">
                        <button type="submit" id="button2" onclick="hide()">Confirm</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
	
    
    <script>
        let form = document.getElementById("cover");
        function show(){
            form.classList.add("show-form");
        }
        function hide(){
            form.classList.remove("show-form")
        }
        function myFunction(){
            alert("hello")
        }
    </script>
</body>
</html>