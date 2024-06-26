<?php

include 'functions/config.php';

session_start();

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);
         $_SESSION['user_name'] = $row['name'];
         $_SESSION['user_id'] = $row['user_id'];
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_address'] = $row['address'];

         header('location:Home.php');
     
   }else{
      $error[] = 'incorrect email or password!';
   }
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
   <!-- bootstrap icon -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
   <title>ReWater</title>
   <link rel="stylesheet" href="css/login_user.css">
   <style>
      ::-ms-reveal {
         display: none;
      }
   </style>
</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" id="password" name="password" required placeholder="enter your password">
      <i class="bi bi-eye-slash" id="togglePassword" style="margin-left:-23px; cursor: pointer;"></i>
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>
</body>
<script>
   const togglePassword = document.querySelector("#togglePassword");
   const password = document.querySelector("#password");

   togglePassword.addEventListener("click", function () {
       // toggle the type attribute
       const type = password.getAttribute("type") === "password" ? "text" : "password";
       password.setAttribute("type", type);

       // toggle the icon
       this.classList.toggle("bi-eye");
   });
</script>
</html>