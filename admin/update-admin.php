<?php
ob_start();
include('partials/header.php');
?>

    <div class="dashboard">   
        
            <h1>Update Admin</h1>

            <br>

            <?php

                // 1. get the ID of selected Admin
                $id = $_GET[id];

                // 2. Create SQL Query to Get the Details
                $sql = "SELECT * FROM admin WHERE id=$id";

                // Execute the Query
                $res = mysqli_query($conn, $sql);

                // Check whether query is executed or not
                if($res==true)
                {
                    // Check whether Data is available or not
                    $count = mysqli_num_rows($res);
                    // Check whether we have admin data or not
                    if($count==1)
                    {
                        // Get the details
                        // echo "Admin Available";
                        $row = mysqli_fetch_assoc($res);

                        $username =$row['username'];
                        $email =$row['email'];
                        $password =$row['password'];
                    }
                    else
                    {
                        // Redirect to manage Admin page
                        header('location:'.SITEURL.'admin/index.php');
                    }
                }

            ?>

            <form action="" method="POST">

                <table class="tbl-30">
                    <tr>
                        <td>Username</td>
                        <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" value="<?php echo $email; ?>"></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td><input type="password" name="password" value="<?php echo $password; ?>"></td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                        </td>
                    </tr>
                </table>

            </form>
        
    </div>

<?php include('partials/footer.php') ?>

<?php
    // Check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        // echo "Button Clicked";
        //  get all thew values from to update
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Create a SQL Query to update Admin
        $sql = "UPDATE admin SET
        username = '$username',
        email = '$email',
        password = '$password'
        WHERE id= '$id'
        ";
        
        // Execute Query
        $res = mysqli_query($conn, $sql);

        // check query success or not
        if($res==true)
        {
            // Query executed and Admin Updated
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully</div>";
            // redirect Admin Page
            header('location:'.SITEURL.'admin/index.php');
        }
        else
        {
            // Failed to update admin
            $_SESSION['update'] = "<div class='error'>Failed to Updated Admin</div>";
            // redirect Admin Page
            header('location:'.SITEURL.'admin/index.php');
            ob_end_flush();
        }
    }

    
?>

