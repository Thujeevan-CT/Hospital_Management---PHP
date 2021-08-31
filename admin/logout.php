<?php
    ob_start();
    // Include Config file for Home Page
    include('../config.php') ;

    // 1. Destroy the Session
    session_destroy(); // unset $_SESSION['user']

    // 2. Redirect to Login page
    header('location:'.SITEURL.'admin-login.php');
    
    ob_end_flush();
?>