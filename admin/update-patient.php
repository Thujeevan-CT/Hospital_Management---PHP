<?php
ob_start();
include('partials/header.php');
?>

    <div class="dashboard">   
        
            <h1>Update Patient</h1>

            <br>

            <?php

                // 1. get the ID of selected Patient
                $id = $_GET[id];

                // 2. Create SQL Query to Get the Details
                $sql = "SELECT * FROM patients WHERE id=$id";

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
                        // echo "Patient Available";
                        $row = mysqli_fetch_assoc($res);

                        $full_name =$row['full_name'];
                        $age =$row['age'];
                        $nic_no =$row['nic_no'];
                        $email =$row['email'];
                    }
                    else
                    {
                        // Redirect to Patient page
                        header('location:'.SITEURL.'admin/patients.php');
                    }
                }

            ?>

            <form action="" method="POST">

                <table class="tbl-30">
                    <tr>
                        <td>Full name</td>
                        <td><input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
                    </tr>
                    <tr>
                        <td>Age</td>
                        <td><input type="text" name="age" value="<?php echo $age; ?>"></td>
                    </tr>
                    <tr>
                        <td>NIC No</td>
                        <td><input type="text" name="nic_no" value="<?php echo $nic_no; ?>"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email" value="<?php echo $email; ?>"></td>
                    </tr>
                    

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="submit" value="Update Patient" class="btn-secondary"> <br> <br>
                            <a href="<?php echo SITEURL; ?>admin/update_password.php?id=<?php echo $id ?>" class="btn-primary">Change Password</a>
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
        $full_name = $_POST['full_name'];
        $age = $_POST['age'];
        $nic_no = $_POST['nic_no'];
        $email = $_POST['email'];
        

        // Create a SQL Query to update Patient
        $sql = "UPDATE patients SET
        full_name = '$full_name',
        age = '$age',
        nic_no = '$nic_no',
        email = '$email'
        WHERE id= '$id'
        ";
        
        // Execute Query
        $res = mysqli_query($conn, $sql);

        // check query success or not
        if($res==true)
        {
            // Query executed and Patient Updated
            $_SESSION['update'] = "<div class='success'>Patient Updated Successfully</div>";
            // redirect Patient Page
            header('location:'.SITEURL.'admin/patients.php');
            
        }
        else
        {
            // Failed to update Patient
            $_SESSION['update'] = "<div class='error'>Failed to Updated Patient</div>";
            // redirect Patient Page
            header('location:'.SITEURL.'admin/patients.php');
            ob_end_flush();
        }
    }

    
?>



