<?php
    ob_start();
    // Authorization - Access Control
    // Check whether the user is logged in or not
    if(!isset($_SESSION['userD'])) // If user session is not set
    {
        // User is not logged in
        // Redirect to login page with message
        $_SESSION['no-longer-message'] = "<div class='error'>Please login to access Doctor Panel</div>";
        // Redirect to Login page
        header('location:'.SITEURL.'admin-login.php');
        ob_end_flush();
    }
?>