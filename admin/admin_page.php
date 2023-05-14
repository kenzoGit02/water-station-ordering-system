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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <!-- fontawesomecdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- fontawesomecdn -->
    <!-- bootstrapcdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- bootstrapcdn -->
    <!-- SweetAlert2 cdn -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- SweetAlert2 cdn -->
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" 
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" 
    crossorigin="anonymous"></script>
    <!-- jquery cdn -->
    <link rel="stylesheet" href="../css/Home.css">
    <link rel="stylesheet" href="../css/admin_page.css">
    <title>ReWater Admin</title>
<style>
    body{
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>
</head>
<body>
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit User Details</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<!-- BODY -->
			<div class="modal-body">
				<div class="container">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="hidden" id='userIDInput' value="">
                                <input type="text" class="form-control" name="name" id="nameInput"aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="emailInput"aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" name="address" id="addressInput"aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary" onclick="editUserInfo()">Edit</button>
			</div>
			</div>
		</div>
	</div>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand font-weight-bold" href="#">ReWater</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link px-2 py-3" href="admin_page.php"><i class="fa fa-fw fa-users"></i>Accounts <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2 py-3" href="admin_rfll_request.php"><i class="fa fa-fw fa-tint"></i>Refills</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2 py-3" href="orders_page.php"><i class="fa fa-fw fa-cart-shopping"></i>Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2 py-3" href="admin_schedule.php"><i class="fa fa-fw fa-calendar-days"></i>Schedules</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2 py-3" href="admin_income_statement.php"><i class="fa fa-fw fa-money-bill-trend-up"></i>Income Statement</a>
                </li>
                <!-- <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle px-2 py-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-bell"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li> -->
                <li class="nav-item active">
                    <a class="nav-link px-2 py-3" href="#"><i class="fa fa-fw fa-user"></i><span id="login-text"><?php echo $_SESSION['admin_name']?></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link px-2 py-3" href="../functions/logout_admin.php"><i class="fa fa-fw fa-right-to-bracket"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- maintenance text -->
    <h3 class="btn-outline-info text-center" id="maintenance-text" style="display:none">
        DAY FOR MONTHLY MAINTENANCE OF WATER FILTER!
    </h3>

    <!-- User Accounts Table -->
    <main class="container-fluid">
        <section class="row d.flex justify-content-center">
            <h1 class="mt-3">User Account Details</h1>
        </section>
        <div class="row" >
            <div class="col" style="overflow:auto">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col" >
                        <table class="table bg-light table-hover rounded table-bordered"id="table">
                            <thead>
                                <tr>
                                    <th scope="col">User ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th class="text-center" scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                            <!-- table data from php goes here -->
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </main>
</body>
<script>
    function checkMaintenance(){
        $.ajax({
            type:'GET',
            url: '../functions/getMaintenanceDate.php',
            success: function(res){
                if(res == 1){
                    $("#maintenance-text").css("display","block");
                }else{
                    $("#maintenance-text").css("display","none");
                }
            }
        });
    }
    checkMaintenance();

    function editUserInfo(){
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
                Swal.fire('Successfully edited','','success');
                location.reload();
            }
        })
    }
    //function to edit user info
    function userEdit(userId){
        let idValue= $("#user-id" + userId).html()
        let nameValue= $("#name" + userId).html()
        let emailValue= $("#email" + userId).html()
        let addressValue= $("#address" + userId).html()
        $("#userIDInput").val(idValue)
        $("#nameInput").val(nameValue)
        $("#emailInput").val(emailValue)
        $("#addressInput").val(addressValue)
    }

    //function to delete user account
    function userDelete(userID){
        Swal.fire({
            icon: 'question',
            title: "Are you sure you wanted to Delete this Account?",
            confirmButtonText: 'Delete',
            showCancelButton: true,
        }).then((result) => {
            if(result.isConfirmed){
                $.ajax({
                    type:'POST',
                    url:'../functions/deleteUserAccount.php',
                    data:{
                        userId: userID
                    },
                    success: function(){
                        Swal.fire('Successfully deleted','','success');
                        refreshTable();
                    }
                });
            }
        });
    }
    //function to refresh table's information
    function refreshTable(){
        $.ajax({
            type:'GET',
            url:'../functions/getUsersInfo.php',
            success: function(response){
                $("#tableBody").html(response);
            }
        })
    }
    //function to refresh table's information at page load
    $(document).ready(function(){
        refreshTable();
    });
</script>
</html>