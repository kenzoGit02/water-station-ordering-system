<?php 

session_start();

$username = $_SESSION['user_name'];
$address = $_SESSION['user_address'];
$post = $_POST["action"];

if($post == "Slim"){
    echo "<div id='cover' class='cover' onclick='hide()''>
    <form action='#' method='post' id='form'class='form'>
        <h1>Place Order</h1>
        <table>
            <tr>
                <th>Order</th>
                <td>Slim Water Container</td>
            </tr>
            <tr>
                <th>Buyer</th>
                <td>$username</td>
            </tr>
            <tr>
                <th>Payment Method</th>
                <td>Cash On Delivery</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>$address</td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td><input type='number' value='1' min='1' name='quantity'></td>
            </tr>
            <tr>
                <td colspan='2' style='text-align:center'>
                    <button  id='' onclick=''>Confirm</button>
                    <button type='submit' id='' onclick=''>Cancel</button>
                </td>
            </tr>
        </table>
    </form>
</div>";
}
if($post == "Round"){
    echo "<div id='cover' class='cover' onclick='hide()''>
    <form action='#' method='post' id='form'class='form'>
        <h1>Place Order</h1>
        <table>
            <tr>
                <th>Order</th>
                <td>Round Water Container</td>
            </tr>
            <tr>
                <th>Buyer</th>
                <td>$username</td>
            </tr>
            <tr>
                <th>Payment Method</th>
                <td>Cash On Delivery</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>$address</td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td><input type='number' value='1' min='1' name='quantity'></td>
            </tr>
            <tr>
                <td colspan='2' style='text-align:center'>
                    <button  id='' onclick=''>Confirm</button>
                    <button type='submit' id='' onclick=''>Cancel</button>
                </td>
            </tr>
        </table>
    </form>
</div>";
}
if($post == "refill"){
    echo "<script>alert('$post');</script>";
}
?>