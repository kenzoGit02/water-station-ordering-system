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
                <li class="nav-item">
                    <a class="nav-link px-2 py-3" href="admin_schedule.php"><i class="fa fa-fw fa-calendar-days"></i>Schedules</a>
                </li>
                <li class="nav-item active">
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
            <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> -->
        </div>
    </nav>

    <!-- maintenance text -->
    <h3 class="btn-outline-info text-center blink" onclick="closeReminder()" id="maintenance-text" style="display:none">
        DAY FOR MONTHLY MAINTENANCE OF WATER FILTER!
    </h3>

    <!-- compute income  -->
    <main class="container mb-3">
        <div class="row mb-sm-1" >
            <div class="container">
                <div class="row">
                    <div class="col-0 col-sm-0 col-md-1 col-lg-2 "></div>
                    <div class="col-12 col-sm-12 col-md-10 col-lg-8  py-3 bg-light rounded">
                        <h4 class="font-weight-bold">Compute the business net income here</h4>
                        <p class="mb-0">- Complete the empty fields necesarry for computation.</p>
                        <p class="mb-0">- Put the amount earned and spent within the past 30 days.</p>
                        <p class="mb-0">- Refilling Sales(quantity of jugs refilled)</p>
                        <p class="mb-0">- Merchandise Sales(slim jugs) (round jugs)</p>
                    </div>
                    <div class="col-0 col-sm-0 col-md-1 col-lg-2 "></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-0 col-sm-0 col-md-1 col-lg-2 "></div>
            <div class="col-12 col-sm-12 col-md-10 col-lg-8  py-3 bg-light rounded">
                <div class="container-fluid">
                    <!-- revenues -->
                    <div class="row">
                        <h5 class="col-12">Revenues</h5>
                    </div>
                    <div class="row mb-4">
                        <div class="col-0"></div>
                        <div class="col-11">
                            <div class="container-fluid">
                                <div class="row mb-1">
                                    <div class="col-6">Refilling Sales (<span id="refill-count"></span>)</div>
                                    <div class="col-3 text-right" id="refill"></div>
                                    <div class="col-3"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5">Walk-in</div>
                                    <div class="col-4 text-right">
                                        <input type="text" class="form-control currencyTextBox text-right ml-3" id="walk-in"  >
                                    </div>
                                    <div class="col-3"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-6">
                                        Merchandise Sales
                                        (<span id="merchandise-count-slim"></span>)
                                        (<span id="merchandise-count-round"></span>)
                                    </div>
                                    <div class="col-3 text-right" style="border-bottom:1px solid black" id="merchandise"></div>
                                    <div class="col-3"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-6">
                                        Total Revenue
                                    </div>
                                    <div class="col-3"></div>
                                    <div class="col-3">₱<span id="read-revenue"></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>
                    <!-- expenses -->
                    <div class="row">
                        <h5 class="col-12">Expenses</h5>
                    </div>
                    <div class="row mb-4">
                        <div class="col-0"></div>
                        <div class="col-11">
                            <div class="container-fluid">
                                <div class="row mb-1">
                                    <div class="col-5">Cost of Goods Sold</div>
                                    <div class="col-4 text-right">
                                        <input type="text" class="form-control currencyTextBox text-right ml-3" id="goods-sold"  >
                                    </div>
                                    <div class="col-3"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5">Water Expenses</div>
                                    <div class="col-4 text-right">
                                        <input type="text" class="form-control currencyTextBox text-right ml-3" id="water"  >
                                    </div>
                                    <div class="col-3"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5">Electricity</div>
                                    <div class="col-4 text-right">
                                        <input type="text" class="form-control currencyTextBox text-right ml-3" id="electricity"  >
                                    </div>
                                    <div class="col-3"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5">Rent</div>
                                    <div class="col-4 text-right">
                                        <input type="text" class="form-control currencyTextBox text-right ml-3" id="rent"  >
                                    </div>
                                    <div class="col-3"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5">Salary</div>
                                    <div class="col-4 text-right">
                                        <input type="text" class="form-control currencyTextBox text-right ml-3" id="salary"  >
                                    </div>
                                    <div class="col-3"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5">Fuel</div>
                                    <div class="col-4 text-right">
                                        <input type="text" class="form-control currencyTextBox text-right ml-3" id="fuel"  >
                                    </div>
                                    <div class="col-3"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-5">Maintenance</div>
                                    <div class="col-4 text-right" style="border-bottom:1px solid black;">
                                        <input type="text" class="form-control currencyTextBox text-right ml-3" id="maintenance"  >
                                    </div>
                                    <div class="col-3"></div>
                                </div>
                                <div class="row mb-1">
                                    <div class="col-6">
                                        Total Expenses
                                    </div>
                                    <div class="col-3"></div>
                                    <div class="col-3" style="border-bottom:1px solid black;">₱<span id="read-expenses"></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>
                    </div>
                    <!-- net income -->
                    <div class="row mb-2">
                        <h5 class="col-8">Net Income</h5>
                        <div class="col-4" style="border-bottom:1px solid black;" >₱<span id="read-net-income"></span></div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-12 text-right">
                            <button class="btn btn-primary" id="compute-button" onclick="computeTotal()">Compute Total</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-0 col-sm-0 col-md-1 col-lg-2 "></div>
        </div>
    </main>
</body>
<script>
    (function($) {
    $.fn.inputFilter = function(callback, errMsg) {
        return this.on("input keydown keyup mousedown mouseup select contextmenu drop focusout", function(e) {
        if (callback(this.value)) {
            // Accepted value
            if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
            $(this).removeClass("input-error");
            this.setCustomValidity("");
            }
            this.oldValue = this.value;
            this.oldSelectionStart = this.selectionStart;
            this.oldSelectionEnd = this.selectionEnd;
        } else if (this.hasOwnProperty("oldValue")) {
            // Rejected value - restore the previous one
            $(this).addClass("input-error");
            this.setCustomValidity(errMsg);
            this.reportValidity();
            this.value = this.oldValue;
            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        } else {
            // Rejected value - nothing to restore
            this.value = "";
        }
        });
    };
    }(jQuery));
    $(".currencyTextBox").inputFilter(function(value) {
    return /^-?\d*[.,]?\d{0,2}$/.test(value); }, "Must be a currency value");
</script>
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

    function getMerchandiseRevenue(){
        $.ajax({
            type:'GET',
            url:'../functions/getMerchandiseRevenue.php',
            dataType: 'JSON',
            success: function(res){
                $("#merchandise").html(res.price);
                $("#merchandise-count-slim").html(res.slim);
                $("#merchandise-count-round").html(res.round);
            }
        });
    }
    function getRefillRevenue(){
        $.ajax({
            type:'GET',
            url:'../functions/getRefillRevenue.php',
            dataType: 'JSON',
            success: function(res){
                $("#refill").html(res.price);
                $("#refill-count").html(res.count);
            }
        });
    }
    function computeTotal(){
        let refill = parseFloat($("#refill").html());
        let merchandise = parseFloat($("#merchandise").html());
        let walk_in = parseFloat($("#walk-in").val());

        let goods_sold = parseFloat($("#goods-sold").val());
        let electricity = parseFloat($("#electricity").val());
        let water = parseFloat($("#water").val());
        let rent = parseFloat($("#rent").val());
        let salary = parseFloat($("#salary").val());
        let fuel = parseFloat($("#fuel").val());
        let maintenance = parseFloat($("#maintenance").val());

        if($("#walk-in").val() == "" || $("#goods-sold").val() == "" || $("#electricity").val() == "" || $("#water").val() == "" || $("#rent").val() == "" || $("#salary").val() == "" || $("#fuel").val() == "" || $("#maintenance").val() == ""){
            Swal.fire('Incomplete Fields','Please fill in the empty fields before computing','warning');
            return;
        }

        let revenue = refill + merchandise + walk_in;
        let expenses = goods_sold + electricity + water + rent + salary + fuel + maintenance;
        let net_income = revenue - expenses;
        console.log(revenue);
        console.log(expenses);
        console.log(net_income);
        $("#read-revenue").html(revenue);
        $("#read-expenses").html(expenses);
        $("#read-net-income").html(net_income);
    }
    getRefillRevenue();
    getMerchandiseRevenue();
</script>
</html>