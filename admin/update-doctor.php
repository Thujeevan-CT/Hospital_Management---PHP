<?php
ob_start();
include('partials/header.php');
?>

    <div class="dashboard">   
        
            <h1>Update Doctor</h1>

            <br>

            <?php

                // 1. get the ID of selected Doctor
                $id = $_GET[id];

                // 2. Create SQL Query to Get the Details
                $sql = "SELECT * FROM doctors WHERE id=$id";

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
                        $study =$row['study'];
                        $email =$row['email'];
                        $password =$row['password'];
                    }
                    else
                    {
                        // Redirect to  Doctor page
                        header('location:'.SITEURL.'admin/doctors.php');
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
                        <td>Studies</td>
                        <td>
                            <input type="text" name="study" value="<?php echo $study; ?>">
                        </td>
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
                            <input type="submit" name="submit" value="Update Doctor" class="btn-secondary">
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
        $study = $_POST['study'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Create a SQL Query to update Doctor
        $sql = "UPDATE doctors SET
        username = '$username',
        study = '$study',
        email = '$email',
        password = '$password'
        WHERE id= '$id'
        ";
        
        // Execute Query
        $res = mysqli_query($conn, $sql);

        // check query success or not
        if($res==true)
        {
            // Query executed and Doctor Updated
            $_SESSION['update'] = "<div class='success'>Doctor Updated Successfully</div>";
            // redirect Doctor Page
            header('location:'.SITEURL.'admin/doctors.php');
        }
        else
        {
            // Failed to update Doctor
            $_SESSION['update'] = "<div class='error'>Failed to Updated Doctor</div>";
            // redirect Doctor Page
            header('location:'.SITEURL.'admin/doctors.php');
            ob_end_flush();
        }
    }

    
?>























