<?php 
ob_start();
include "config.php";  
include "Partials/Header.php";
?>

    <!-- Register Login patients -->

    <section class="form-flex wrapper">
        <div class="img-cont">
         <?php
               if(isset($_SESSION['success-register']))
               {
                  echo $_SESSION['success-register']; // displaying session message
                  unset($_SESSION['success-register']); // removing session message 
               }

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
                  if(isset($_SESSION['pwd-not-match']))
                  {
                     echo $_SESSION['pwd-not-match'];
                     unset($_SESSION['pwd-not-match']);
                  }
            ?>
         <img src="img/Filing_system.svg" alt="">
         </div>
        <div class="p-form form-wrap">
            <div class="title-text">
               <div class="title login">
                  Login Form
               </div>
               <div class="title signup">
                  Register Form
               </div>
            </div>
            <div class="form-container">

               <div class="slide-controls">
                  <input type="radio" name="slide" id="login" checked>
                  <input type="radio" name="slide" id="signup">
                  <label for="login" class="slide login">Login</label>
                  <label for="signup" class="slide signup">Register</label>
                  <div class="slider-tab"></div>
               </div>
               <div class="form-inner">

                  <!-- Patient Login -->

                  <form  action="" method="post" class="login">
                     <div class="field">
                        <input type="text" placeholder="Email Address" name="email-patient" required>
                     </div>
                     <div class="field">
                        <input type="password" placeholder="Password" name="password-patient" required>
                     </div>
                     <!-- <div class="pass-link">
                        <a href="#">Forgot password?</a>
                     </div> -->
                     <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Login" name="login_patient">
                     </div>
                     <div class="signup-link">
                        Not a member? <a href="">Signup now</a>
                     </div>
                  </form>
				  

                  <!-- Register -->
                  <form action="login_register.php" method="post" class="signup">
                     <div class="field">
                        <input type="text" placeholder="Full Name" name="full_name" required>
                     </div>
					 <div class="field">
                        <input type="text" placeholder="Age" name="age" required >
                     </div>
                     <div class="field">
                        <input type="text" placeholder="NIC number" name="nic_no" required >
                     </div>
					 <div class="field">
                        <input type="email" placeholder="Email Address" name="email" required >
                     </div>
                     <div class="field">
                        <input type="password" placeholder="Password" id="pass1" name="password_1" required >
                        <br>
                        <br>
                     </div>
                     <div class="field">
                        <input type="password" placeholder="Confirm password" id="pass2" name="password_2" required >
                        <small></small>
                     </div>
                     
                     <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Signup" name="reg_user">
                     </div>
                  </form>

               </div>
            </div>
         </div>
      </section>

   <script>
      // Javascript for Matching Password check

      let pass1 = document.querySelector('#pass1');
      let pass2 = document.querySelector('#pass2');
      let result = document.querySelector('small');

      function checkPassword(){
         if(pass1.value != "" || pass2.value != ""){
            result.innerText = pass1.value == pass2.value ? 'Passwords Matching.' : 'Not Matching...';
         }
      }

      pass1.addEventListener('keyup', () => {
         if(pass2.value.length != 0) checkPassword();
      })

      pass2.addEventListener('keyup', checkPassword);



   </script>

<?php include 'Partials/Footer.php'; ?>

<?php
      // Login for Patients

   if(isset($_POST['login_patient']))
   {
      // process of Login
      // 1. Get the Data from Login form
      $email = $_POST['email-patient'];
      $password2 = $_POST['password-patient'];

      $password = md5($password2);

      // Get All the Data
      $sqlAll = "SELECT * FROM patients";

      // 2. SQL check Admin email and password exists or not
      $sql = "SELECT * FROM patients WHERE email='$email' AND password='$password'";

      // 3. Execute the query
      $res = mysqli_query($conn, $sql);


      // 4. Count rows to check whether the user exists or not
      $count = mysqli_num_rows($res);
      

      if($count==1)
      {
         // Login Success
         $_SESSION['login'] = "<div class='success text-center'>$email your Login Successful.</div>";
         $_SESSION['user'] = $email; //To check whether Logged in or not and logout will unset it
         // Redirect to Patient Dashboard
         header("location:".SITEURL.'patient/');

      }
      else
      {
         // Login failed
         $_SESSION['login'] = "<div class='error text-center'>Email or password did not match.</div>";
         // Redirect to Patient Login Page
         header("location:".SITEURL.'login_register.php');
      }

   }

   // REGISTER USER
if (isset($_POST['reg_user'])) {
   // receive all input values from the form
   $full_name_reg = mysqli_real_escape_string($conn, $_POST['full_name']);
   $age_reg = mysqli_real_escape_string($conn, $_POST['age']);
   $nic_no_reg = mysqli_real_escape_string($conn, $_POST['nic_no']);
   $email_reg = mysqli_real_escape_string($conn, $_POST['email']);
   $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
   $password_22 = mysqli_real_escape_string($conn, $_POST['password_2']);
 
 
   $password_reg = md5($password_22); //encrypt the password before saving in the database
 
     // SQL Query
      $query = "INSERT INTO patients (full_name, age, nic_no, email, password) 
              VALUES('$full_name_reg', '$age_reg', '$nic_no_reg', '$email_reg', '$password_reg')";
     
     // Execute
     $res = mysqli_query($conn, $query);
 
     if($res==true)
     {
       $_SESSION['success-register'] = "<div class='success'>Register your Account. Now you can Login your Account.</div>";
        header("location:".SITEURL.'login_register.php');
     }
     else
     {
       $_SESSION['success-register'] = "<div class='error'>Failed to Register Account. Try Again.</div>";
       header("location:".SITEURL.'login_register.php');
     }
      
   
 
 }

?>