<?php
    ob_start();
    // Include constants File here
    include('../config.php');

    // 1. get the ID of Admin to be deleted
    $id = $_GET['id'];

    // 2. Create SQL Query to delete Admin
    $sql = "DELETE FROM admin WHERE id=$id";

    // Execute the query
    $res = mysqli_query($conn, $sql);

    // check whether query executed success
    if($res==true)
    {
        // Query executed successfully and admin deleted
        // echo "Admin Deleted";

        // Create session var to Display msg
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
        // Redirect to Manage Admin page
        header('location:'.SITEURL.'admin/index.php');
    }
    else
    {
        // Failed to delete Admin
        // echo "Failed to Delete Admin";
        $_SESSION['delete'] = "<div class='error'>Failed to delete Admin.</div>";
        header('location:'.SITEURL.'admin/index.php');

    }

    // Redirect to manage Admin Page with message (success/error)

    ob_end_flush();
?>