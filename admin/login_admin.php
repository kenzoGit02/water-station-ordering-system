<?php

   include '../functions/config.php';

   session_start();

   if(isset($_POST['submit'])){

      // $name = mysqli_real_escape_string($conn, $_POST['name']);
      $email = $_POST['email'];
      $pass = md5($_POST['password']);
      // $cpass = md5($_POST['cpassword']);
      // $user_type = $_POST['user_type'];

      $select = "SELECT * FROM admin_form WHERE email = '$email' && password = '$pass' ";

      $result = mysqli_query($conn, $select);

      if(mysqli_num_rows($result) > 0){

         $row = mysqli_fetch_array($result);
         $_SESSION['admin_name'] = $row['name'];
         $_SESSION['admin_email'] = $row['email'];
         $_SESSION['admin_id'] = $row['admin_id'];

         header('location:admin_page.php');
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
   <link rel="stylesheet" href="../css/login_admin.css">
   <title>ReWater Admin</title>
</head>
<body>
   <!-- LOGIN FORM -->
<div class="form-container">

   <form action="" method="post">
      <title>ReWater Admin</title>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         }
      }
      ?>
      <input type="email" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <!-- <p>don't have an account? <a href="register_admin.php">register now</a></p> -->
   </form>

</div>
</body>
</html>