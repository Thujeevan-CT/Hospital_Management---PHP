<?php 
ob_start();
include "config.php"; 
include "Partials/Header.php";
?>

    <!-- Register Login patients -->

    <section class="form-flex wrapper">
        <div class="img-cont">
           <br>
           <?php
               if(isset($_SESSION['login']))
               {
                  echo $_SESSION['login'];
                  unset($_SESSION['login']);
               }
               if(isset($_SESSION['no-longer-message']))
               {
                  echo $_SESSION['no-longer-message'];
                  unset($_SESSION['no-longer-message']);
               }
           ?>
            <img src="img/medicine.svg" alt="">
        </div>
        <div class="p-form form-wrap">
            <div class="title-text">
               <div class="title login">
                  Doctor's Login
               </div>
               <div class="title signup">
                  Admin Login
               </div>
            </div>
            <div class="form-container">
            
               <div class="slide-controls">
                  <input type="radio" name="slide" id="login" checked>
                  <input type="radio" name="slide" id="signup">
                  <label for="login" class="slide login">Doctor's Login</label>
                  <label for="signup" class="slide signup">Admin Login</label>
                  
                  <div class="slider-tab"></div>
               </div>
               <div class="form-inner">
                  <!-- Doctors -->
                  <form action="" method="post" class="login">
                     <div class="field">
                        <input type="text" placeholder="Email Address" name="email-doctor" required>
                     </div>
                     <div class="field">
                        <input type="password" placeholder="Password" name="password-doctor" required>
                     </div>
                     
                     <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Login" name="login_doctor">
                     </div>
                    
                  </form>
                  <!-- Admin -->
                  <form action="" method="post" class="signup">
                  
                     <div class="field">
                        <input type="email" placeholder="Email Address" name="email-admin" required>
                     </div>
                     <div class="field">
                        <input type="password" placeholder="Password" name="password-admin" required>
                     </div>
                     <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Login" name="login_admin">
                     </div>
                  </form>
               </div>
            </div>
         </div>
    </section>

    
<?php include 'Partials/Footer.php' ?> 

<?php

   // Login For Doctors
   if(isset($_POST['login_doctor']))
   {
      // process of Login
      // 1. Get the Data from Login form
      $email = $_POST['email-doctor'];
      $password = $_POST['password-doctor'];

      // 2. SQL check Admin email and password exists or not
      $sql = "SELECT * FROM doctors WHERE email='$email' AND password='$password'";

      // 3. Execute the query
      $res = mysqli_query($conn, $sql);

      // 4. Count rows to check whether the user exists or not
      $count = mysqli_num_rows($res);

      if($count==1)
      {
         // Login Success
         $_SESSION['login'] = "<div class='success text-center'>Login Successful.</div>";
         $_SESSION['userD'] = $email; //To check whether Logged in or not and logout will unset it
         // Redirect to Admin Dashboard
         header("location:".SITEURL.'doctor/');

      }
      else
      {
         // Login failed
         $_SESSION['login'] = "<div class='error text-center'>Email or password did not match.</div>";
         // Redirect to Admin Login Page
         header("location:".SITEURL.'admin-login.php');
      }

   }


   // Login For Admins
   if(isset($_POST['login_admin']))
   {
      // process of Login
      // 1. Get the Data from Login form
      $email_admin = $_POST['email-admin'];
      $password_admin = $_POST['password-admin'];

      // 2. SQL check Admin email and password exists or not
      $sql = "SELECT * FROM admin WHERE email='$email_admin' AND password='$password_admin'";

      // 3. Execute the query
      $res = mysqli_query($conn, $sql);

      // 4. Count rows to check whether the user exists or not
      $count = mysqli_num_rows($res);

      if($count==1)
      {
         // Login Success
         $_SESSION['login'] = "<div class='success text-center'>$email_admin Login Successful.</div>";
         $_SESSION['user'] = $email_admin; //To check whether Logged in or not and logout will unset it
         // Redirect to Admin Dashboard
         header("location:".SITEURL.'admin/');

      }
      else
      {
         // Login failed
         $_SESSION['login'] = "<div class='error text-center'>Email or password did not match.</div>";
         // Redirect to Admin Login Page
         header("location:".SITEURL.'admin-login.php');
      }

   }

?>