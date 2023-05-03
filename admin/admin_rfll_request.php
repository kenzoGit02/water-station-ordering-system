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
            <li class="nav-item active">
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
    <!-- Refill Table -->
    <main class="container">
        <section class="row d.flex justify-content-center">
            <h1 class="mt-3">Refill Orders</h1>
        </section>
        <div class="row">
            <table class="table bg-light table-hover rounded mx-3 table-bordered" id="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Delivered & Paid</th>
                    </tr>
                </thead>
                <tbody id="tableBody"></tbody>
            </table>
        </div>
    </main>
    
</body>
<script>
    function finishRequest(id){
        $.ajax({
        type:'POST',
        url:'../functions/completeOrder.php',
        data:{
            order_id: id
        }
        })
    }
    function getRequests(){
        $.ajax({
            type:'POST',
            url:'../functions/getRequests.php',
            success: function(response){
            $("#tableBody").html(response);
            }
        });
    }
    getRequests();
    setInterval(() => {
        getRequests();
    }, 2000);
</script>
</html>