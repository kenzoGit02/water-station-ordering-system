<?php 
    session_start();
    if(!isset($_SESSION['user_id'])){
        header('location:login_form.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link rel="stylesheet" href="css/Home.css">
	<!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" 
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" 
    crossorigin="anonymous"></script>
    <!-- jquery cdn -->
    <title>ReWater</title>
</head>
<body>
    <!-- password modal -->
    <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<!-- BODY -->
			<div class="modal-body">
				<div class="container">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="verify">Verify it's you</label>
                                <input type="password" class="form-control" id="verify">
                                <small class="text-danger" style="display:none;" id="wrong-password">Wrong Password</small>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-secondary ml-auto" id="verify-button" onclick="verifyPassword()">Confirm</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label for="new-password">New Password</label>
                                <input type="password" class="form-control" id="new-password" disabled>
                            </div>
                            <div class="form-group">
                                <label for="confirm-password">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm-password" disabled>
                                <small class="text-danger" style="display:none;" id="password-not-matched"></small>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<button type="button" class="btn btn-primary" id="change-password"onclick="" disabled>Change Password</button>
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
                <li class="nav-item">
                    <a class="nav-link px-2 py-3" href="Home.php"><i class="fa fa-fw fa-home"></i>Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2 py-3" href="Services.php"><i class="fa fa-fw fa-tint"></i>Buy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2 py-3" href="order_details.php"><i class="fa fa-fw fa-info"></i>Order Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2 py-3" href="about_us.php"><i class="fa fa-fw fa-users"></i>About Us</a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle px-2 py-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-bell"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link px-2 py-3" href="user_profile.php"><i class="fa fa-fw fa-user"></i><span id="login-text"><?php echo $_SESSION['user_name']?></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link px-2 py-3" href="functions/logout.php"><i class="fa fa-fw fa-right-to-bracket"></i>Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- profile -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="mx-5">
                    <h1>Profile Details</h1>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control bg-light" id="name" disabled>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control bg-light" id="email" disabled>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control bg-light" name="address" id="address" cols="30" rows="3" disabled></textarea>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#passwordModal">
                            Change Password
                        </button>
                        <button class="btn btn-primary" id="edit-button" onclick="editDetails()">Edit Details</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <!-- Footer -->
	<div class="footer">
		<p>&copy; 2023 All Rights Reserved.</p>
	</div>
</body>
<script>
    function verifyPassword(){
        let verify_password = $("#verify").val();
        $.ajax({
            type:'POST',
            url:'functions/verifyPassword.php',
            data: {password: verify_password},
            success: function(res){
                if(res == "Verified"){
                    $("#wrong-password").attr('class','text-success');
                    $("#wrong-password").html("Password Verified");
                    $("#wrong-password").css('display','block');
                    $("#new-password").attr('disabled', false);
                    $("#confirm-password").attr('disabled', false);
                }
                else{
                    $("#wrong-password").css('display','block');
                    $("#wrong-password").html("Wrong Password");
                    $("#wrong-password").attr('class','text-danger');
                    $("#new-password").attr('disabled', true);
                    $("#confirm-password").attr('disabled', true);
                    $("#change-password").attr('disabled', true);
                }
            }
        })
    }
    $("#confirm-password").on("keyup", function(){
        if($("#new-password").val().trim() == $("#confirm-password").val().trim()){
            $("#change-password").attr('disabled', false);
            $("#password-not-matched").html("Password matched");
            $("#password-not-matched").css('display','block');
            $("#password-not-matched").attr('class','text-success');
        }else{
            $("#change-password").attr('disabled', true);
            $("#password-not-matched").html("Password do not matched");
            $("#password-not-matched").css('display','block');
            $("#password-not-matched").attr('class','text-danger');
        }
    });
    function changePassword(){
        $.ajax({
            type:'POST',
            url:'functions/changePassword.php',
            data:{},
            success: function(){
                
            }
        })
    }
    function editDetails(){
        $("#name").removeAttr('disabled');
        $("#email").removeAttr('disabled');
        $("#address").removeAttr('disabled');
        $("#edit-button").removeAttr('onclick');
        $("#edit-button").attr("disabled", true);
        $("#edit-button").attr('onclick', 'saveChanges()');
        $("#edit-button").html('Save Changes');
    }

    $("input,textarea").on('keydown', function(){
        $("#edit-button").removeAttr('disabled');
    })
    
    function getProfileDetails(){
        $.ajax({
            type:'GET',
            url:'functions/getProfileDetails.php',
            dataType: 'JSON',
            success: function(res){
                $("#name").val(res.name);
                $("#email").val(res.email);
                $("#address").val(res.address);
            }
        });
    }
    getProfileDetails();
    function saveChanges(){
        let name = $("#name").val().trim();
        let email = $("#email").val().trim();
        let address = $("#address").val().trim();
        if(name == ""|| email == ""|| address == ""){
            Swal.fire('','Please do not leave an input empty','error');
            return;
        }
        $.ajax({
            type:'POST',
            url:'functions/editProfileDetails.php',
            data:{name:name,email:email,address:address},
            success: function(res){
                if(res == 1){
                    Swal.fire('Successfully Edited','','success')
                    .then((res)=>{
                        location.reload();
                    });
                } else {
                    Swal.fire('Error Occured',res,'error');
                }
            }
        })
    }
    
</script>
</html>