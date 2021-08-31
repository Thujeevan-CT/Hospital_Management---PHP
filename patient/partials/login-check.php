<?php
    ob_start();
    // Authorization - Access Control
    // Check whether the user is logged in or not
    if(!isset($_SESSION['user'])) // If user session is not set
    {
        // User is not logged in
        // Redirect to login page with message
        $_SESSION['no-longer-message'] = "<div class='error'>Please Login to Access.</div>";
        // Redirect to Login page

        header('location:'.SITEURL.'login_register.php');
        ob_end_flush();
    }
?>