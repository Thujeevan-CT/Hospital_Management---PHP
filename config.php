<?php
    // Start session
    session_start();
    
    // Create constant to store non repeating values
    define('SITEURL', 'http://localhost/NASCP_Project/');
    define('LOCALHOST', 'localhost');    
    define('DB_USERNAME', 'root');    
    define('DB_PASSWORD', '');    
    define('DB_NAME', 'nsacp');    

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); // DB Connection
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); // Selecting DB
    
?>
