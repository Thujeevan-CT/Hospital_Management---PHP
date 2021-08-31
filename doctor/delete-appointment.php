<?php
    ob_start();
    // Include constants File here
    include('../config.php');

    // 1. get the ID of Admin to be deleted
    $id = $_GET['id'];

    // 2. Create SQL Query to delete appointment
    $sql = "DELETE FROM appointments WHERE id=$id";

    // Execute the query
    $res = mysqli_query($conn, $sql);

    // check whether query executed success
    if($res==true)
    {
        // Query executed successfully and admin deleted
        // echo "appointment Deleted";

        // Create session var to Display msg
        $_SESSION['delete'] = "<div class='success'>Appointment Deleted Successfully.</div>";
        // Redirect to Manage appointment page
        header('location:'.SITEURL.'doctor/index.php');
    }
    else
    {
        // Failed to delete appointment
        // echo "Failed to appointment Admin";
        $_SESSION['delete'] = "<div class='error'>Failed to delete Appointment.</div>";
        header('location:'.SITEURL.'doctor/index.php');
        ob_end_flush();
    }

    // Redirect to manage appointment Page with message (success/error)

?>