<?php
    // Include constants File here
    include('../config.php');

    // 1. get the ID of doctor to be deleted
    $id = $_GET['id'];

    // 2. Create SQL Query to delete Admin
    $sql = "DELETE FROM doctors WHERE id=$id";

    // Execute the query
    $res = mysqli_query($conn, $sql);

    // check whether query executed success
    if($res==true)
    {
        // Query executed successfully and doctor deleted
        // echo "doctor Deleted";

        // Create session var to Display msg
        $_SESSION['delete'] = "<div class='success'>Doctor Deleted Successfully.</div>";
        // Redirect to Manage Doctor page
        header('location:'.SITEURL.'admin/doctors.php');
    }
    else
    {
        // Failed to delete doctors
        // echo "Failed to Delete doctors";
        $_SESSION['delete'] = "<div class='error'>Failed to delete Doctor.</div>";
        header('location:'.SITEURL.'admin/doctors.php');

    }

    // Redirect to manage doctors Page with message (success/error)

?>