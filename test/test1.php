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
    <style>
        *{
	    box-sizing: border-box;
        margin:0;
        padding:0;
        }
        body{
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position:relative;
        }
        .cover{
        height:100vh;
        width:100%;
        background: rgba(0, 0, 0, .5);
        position:absolute;
        top:50%;
        left:50%;
        transform:translate(-50%, -50%);
        display: none;
        }
        .form{
        border-radius:10px;
        position:absolute;
        background: white;
        top:50%;
        left:50%;
        transform:translate(-50%, -50%);
        width:500px;
        height:200px;
        display: flex;
        align-items: center;
        justify-content: center;
        
        }
        .hide-form{
	    display:none;
        }
    </style>
</head>
<body>
<button id="button" onclick="showFunction()">SHOW</button>



    <!-- pop-up form -->
<div id='cover' class='cover'>
    <form action='#' method='POST' id='form' class='form'>
        <h1>Place Order</h1>
        <input type='hidden' id='userID' value='$userId'>
        <table>
            <tr>
                <th>Order</th>
                <td id='order'>Round Water Container</td>
            </tr>
            <tr>
                <th>Buyer</th>
                <td id='username'>$username</td>
            </tr>
            <tr>
                <th>Payment Method</th>
                <td>Cash On Delivery</td>
            </tr>
            <tr>
                <th>Address</th>
                <td id='address'>$address</td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td><input type='number' value='1' min='1' name='quantity'></td>
            </tr>
            <tr>
                <td colspan='2' style='text-align:center'>
                    <button id='confirm-button'>Confirm</button>
                    <button onclick="hide()">Cancel</button>
                </td>
            </tr>
        </table>
    </form>
</div>
<script>
    function showFunction(){
        document.getElementById("cover").style.display = "block";
    }
        $(document).ready(function(){
            
        })
        $('#form').submit(function(event){
                event.preventDefault();
            })
    function hide(){
        let cover = document.getElementById("cover");
		cover.style.display = 'none';
    }
</script>
</body>
</html>