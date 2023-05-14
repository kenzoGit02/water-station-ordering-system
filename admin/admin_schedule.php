<?php
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
    <link rel="stylesheet" href="../css/Home.css">
	<!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" 
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" 
    crossorigin="anonymous"></script>
    <!-- jquery cdn -->
	<title>ReWater Admin</title>
<style>
    body{
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
</style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand font-weight-bold" href="#">ReWater</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link px-2 py-3" href="admin_page.php"><i class="fa fa-fw fa-users"></i>Accounts <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2 py-3" href="admin_rfll_request.php"><i class="fa fa-fw fa-tint"></i>Refills</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2 py-3" href="orders_page.php"><i class="fa fa-fw fa-cart-shopping"></i>Orders</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link px-2 py-3" href="admin_schedule.php"><i class="fa fa-fw fa-calendar-days"></i>Schedules</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2 py-3" href="admin_income_statement.php"><i class="fa fa-fw fa-money-bill-trend-up"></i>Income Statement</a>
                </li>
                <!-- <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle px-2 py-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa-solid fa-bell"></i>
                    <span class="badge badge-danger"id="notif-count">
						4
					</span>
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
    <h3 class="btn-outline-info text-center blink"id="maintenance-text" style="display:none">
        DAY FOR MONTHLY MAINTENANCE OF WATER FILTER!
    </h3>

    <!-- Schedules -->
    <div class="container my-5">
        <div class="row mb-5">
            <div class="col-lg">
                <h1 class="text-center">Schedules</h1>
            </div>
        </div>
        <div class="row mb-5 bg-light rounded">
            <div class="container m-3">
                <!-- <div class="row my-2">
                    <div class="col-md-3 d-flex align-items-center">
                        <p class="lead">Business Days Active:</p>
                    </div>
                    <div class="col-md-6">
                        <form class="form-inline">
                            <input type="text" class="form-control bg-light mr-sm-1"  placeholder="Placeholder" disabled>
                            to
                            <input type="text" class="form-control bg-light ml-sm-1"  placeholder="Placeholder" disabled>
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div> -->
                <div class="row">
                    <div class="col-md-5">
                        <p class="lead">
                            Scheduled Water Filter maintenance this month:
                        </p>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control bg-light" id="scheduled-maintenance" disabled>
                    </div>
                    <div class="col-md-5"></div>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-lg">
                <h1 class="text-center">Set Schedules</h1>
            </div>
        </div>
        <div class="row mb-5 bg-light rounded">
            <!-- business days -->
            <!-- <div class="col-md-6 pt-3">
                <div class="form-group">
                    <label for="business-days" class="h3">Business Days</label>
                    <p class="form-text text-muted">From</p>
                    <select class="form-control custom-select" id="business-days">
                        <option selected>Start</option>
                        <option value="Sunday">Sunday</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                    </select>
                    <p class="form-text text-muted">To</p>
                    <select class="form-control custom-select" id="business-days">
                        <option selected>End</option>
                        <option value="Sunday">Sunday</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                    </select>
                    <button type="submit" class="btn btn-primary mt-1">Save</button>
                </div>
            </div> -->
            <div class="col-md-3"></div>
            <div class="col-md-6 pt-3">
                <div class="form-group">
                    <label for="maintenance" class="h3">Water Filter Maintenance</label>
                    <p class="form-text text-muted">Set the day of monthly maintenance for the water filter</p>
                    <select class="form-control custom-select mb-1" id="maintenance">
                        <option disabled selected>Day</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">Last day of the month</option>
                    </select>
                    <div class="btn btn-primary" onclick="saveDate()">Save</div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
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
    
    function getDate(){
        $.ajax({
            type:'POST',
            url:'../functions/getMaintDate.php',
            success: function(response){
                $("#scheduled-maintenance").val(response);
            }
        });
    }
    getDate();
    function saveDate(){
        var date = $("#maintenance").val();
        if(date == null){
            Swal.fire('Please select a date first','','error');
        }else{
            $.ajax({
                type:'POST',
                url:'../functions/saveMaintDate.php',
                data:{
                    date: date,
                },
                success: function(data){
                    Swal.fire('Success','Monthly Maintenance set to every '+ data +' of the month','success');
                    getDate();
                }
            });
        }
    }
</script>
</html>