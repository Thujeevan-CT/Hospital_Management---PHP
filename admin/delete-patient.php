<?php
    // Include constants File here
    include('../config.php');

    // 1. get the ID of patients to be deleted
    $id = $_GET['id'];

    // 2. Create SQL Query to delete Admin
    $sql = "DELETE FROM patients WHERE id=$id";

    // Execute the query
    $res = mysqli_query($conn, $sql);

    // check whether query executed success
    if($res==true)
    {
        // Query executed successfully and patients deleted
        // echo "patients Deleted";

        // Create session var to Display msg
        $_SESSION['delete'] = "<div class='success'>Patient Deleted Successfully.</div>";
        // Redirect to Manage patients page
        header('location:'.SITEURL.'admin/patients.php');
    }
    else
    {
        // Failed to delete patients
        // echo "Failed to Delete patients";
        $_SESSION['delete'] = "<div class='error'>Failed to delete Patient.</div>";
        header('location:'.SITEURL.'admin/patients.php');

    }

    // Redirect to manage patients Page with message (success/error)

?>