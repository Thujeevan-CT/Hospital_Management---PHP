<?php
ob_start();
include('partials/header.php');
?>

    <!-- Change Password -->

    <div class="dashboard">   
        
        <h1>Change Password</h1>
        <br> <br>

        <?php
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>New Password: </td>
                    <td>
                        <input type="text" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password: </td>
                    <td>
                        <input type="text" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>

    </div>

<?php include('partials/footer.php') ?>

<?php

    // Check whether Submit button is Click or not
    if(isset($_POST['submit']))
    {
        // echo 'Clicked';

        // 1. Get the Data form Form
        $id=$_POST['id'];
        $new_password= md5($_POST['new_password']);
        $confirm_password= md5($_POST['confirm_password']);

        if($new_password==$confirm_password)
            {
                // Update the Password
                // Create a SQL Query to update Admin
                $sql = "UPDATE patients SET
                password = '$new_password'
                WHERE id= '$id'
                ";
            
                // Execute Query
                $res = mysqli_query($conn, $sql);

                // check query success or not
                if($res==true)
                {
                    // Query executed and Admin Updated
                    $_SESSION['change-pwd'] = "<div class='success'>Patient Password Updated Successfully</div>";
                    // redirect Admin Page
                    header('location:'.SITEURL.'admin/patients.php');
                }
                else
                {
                    // Failed to update admin
                    $_SESSION['change-pwd'] = "<div class='error'>Failed to Patient Password</div>";
                    // redirect Admin Page
                    header('location:'.SITEURL.'admin/patients.php');
                }
            }
            else
            {
                // redirect to patients page with Error msg
                $_SESSION['pwd-not-match'] = "<div class='error'>Password Did not match.</div>";
                // Redirect to Patient
                header('location:'.SITEURL.'admin/patients.php');
                ob_end_flush();
                
            }
    }


?>