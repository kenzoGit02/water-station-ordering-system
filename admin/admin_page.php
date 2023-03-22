<?php
   include '../functions/config.php';

   session_start();

   if(!isset($_SESSION['admin_name'])){
      header('location:login_admin.php');
   };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/Home.css">
    <link rel="stylesheet" href="../css/admin_page.css">
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" 
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" 
    crossorigin="anonymous"></script>
    <!-- jquery cdn -->
    <script src="../script/script.js"></script>
    <title>ReWater Admin</title>
<style>
body{
    background-repeat: no-repeat;
    background-attachment: fixed;
}
#table{
    margin:auto;
}
#table th, #table td{
    border:1px solid black;
    width:30vw;
    padding:15px 10px;
}
</style>
</head>
<body>
    <!-- Navigation Bar -->
    <div class="topnav" id="myTopnav">
        <a class="active" href="admin_page.php"><i class="fa fa-fw fa-users"></i>Accounts</a>
        <a href="admin_rfll_request.php"><i class="fa fa-fw fa-tint"></i>Refills</a>
        <a href="orders_page.php"><i class="fa fa-fw fa-tint"></i>Orders</a>
        <a href="#signin"><i class="fa fa-fw fa-user"></i><span id="login-text"><?php echo $_SESSION['admin_name']?></span></a>
        <a href="../functions/logout_admin.php">Logout</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
    </div>
    <!-- User Accounts Table -->
    <table id="table">
        <tr>
            <th colspan="5"><h1>User Accounts</h1></th>
        </tr>
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        <tbody id="tableBody">
        <!-- table data from php goes here -->
        </tbody>
    </table>
    <!-- Edit Form -->
    <div id='cover' class='cover'>
            <form action='' method='POST' id='editForm' class='editForm'>
                <!-- close icon -->
                <i id='close'class="fa fa-2x fa-window-close"onclick='hide()'aria-hidden="true"></i>
                <h1 id='edit-header'>Edit User Details</h1>
                <!-- input used to store session's user id value -->
                <input type="hidden" id='userIDInput' value="">
                <label for='name'>Name:</label>
                <input type='text' name='name' id='nameInput'>
                <label for='email'>Email:</label>
                <input type='text' name='email' id='emailInput'>
                <label for='address'>Address:</label>
                <input type='text' name='address' id='addressInput'>
                <button id='confirmEdit'>Confirm</button>
            </form>
    </div>
</body>
<script>
    //function to edit user info on database
    $('#editForm').submit(function(event){
        event.preventDefault()
        let inputUserId = $("#userIDInput").val()
        let inputName = $("#nameInput").val()
        let inputEmail = $("#emailInput").val()
        let inputAddress = $("#addressInput").val()
        $.ajax({
            type:'POST',
            url:'../functions/editUsersInfo.php',
            data:{
                userId:inputUserId,
                name:inputName,
                email:inputEmail,
                address:inputAddress
            },
            success: function(response){
                alert(response)
                hide()
                refreshTable()
            }
        })
    })
    //function to edit user info
    function userEdit(userId){
        let idValue= $("#user-id" + userId).html()
        let nameValue= $("#name" + userId).html()
        let emailValue= $("#email" + userId).html()
        let addressValue= $("#address" + userId).html()
        $("#cover").css('display','block')
        $("#userIDInput").val(idValue)
        $("#nameInput").val(nameValue)
        $("#emailInput").val(emailValue)
        $("#addressInput").val(addressValue)
    }
    //function to delete user info
    function userDelete(userID){
        if(confirm("Are you sure you wanted to delete User's Account") == true) {
            $.ajax({
            type:'POST',
            url:'../functions/deleteUserAccount.php',
            data:{
                userId: userID
            },
            success: function(res){
                alert(res)
                refreshTable()
            }
            })
        }
    }
    //function to hide user info edit
    function hide(){
        $("#cover").css('display','none')
    }
    //function to refresh table's information
    function refreshTable(){
        $.ajax({
            type:'GET',
            url:'../functions/getUsersInfo.php',
            success: function(response){
                $("#tableBody").html(response)
            }
        })
    }
    //function to refresh table's information at page load
    $(document).ready(function(){
        refreshTable()
        // setInterval(() => {
        //    refreshTable()
        // }, 1000);
    });
</script>
</html>