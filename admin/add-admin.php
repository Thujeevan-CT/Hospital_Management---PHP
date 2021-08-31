<?php
ob_start();
include('partials/header.php');
?>

    <div class="dashboard">   
        
            <h1>Add Admin</h1>

            <br>

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; // displaying session message
                    unset($_SESSION['add']); // removing session message 
                }
            ?>

            <form action="" method="POST">
                <table class="tbl-30">
                    <tr>
                        <td>Username: </td>
                        <td>
                            <input type="text" name="username" placeholder="Enter Username">
                        </td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td>
                            <input type="email" name="email" placeholder="Email">
                        </td>
                    </tr>
                    <tr>
                        <td>Password: </td>
                        <td>
                            <input type="password" name="password" placeholder="Your Password">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                        </td>
                    </tr>
                </table>
            </form>
        
    </div>

<?php include('partials/footer.php') ?>

<?php
    // Process the value from form save it in Database

    // Check whether submit is clicked or not

    if(isset($_POST['submit']))
    {
        // Button clicked
        // echo "Button";
        
        // echo $full_name;
        // echo $username;
        // echo $password;

        // 1. Get the data from Form
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // 2. Sql query to save the data to DB
        $sql = "INSERT INTO admin SET 
            username = '$username',
            email = '$email',
            password = '$password'
        ";

        // 3. Executing Query and Saving Data into DB
        $res = mysqli_query($conn, $sql) or die(mysqli_error());
        
        // 4. Check whether the (Query is Executed) data s inserted or not and display appropriate message
        if($res==true)
        {
            // Data Inserted
            // echo "Data Inserted";
            // Create a session variable to display message
            $_SESSION['add'] = "<div class='success'>Admin Added Successfully</div>";
            // Redirect Page Manage Admin
            header("location:".SITEURL.'admin/index.php');
        }
        else
        {
            // Failed to Insert Data
            // echo "Failed to Insert Data";
            // Create a session variable to display message
            $_SESSION['add'] = "<div class='error'>Failed to Add Admin</div>";
            // Redirect Page Add Admin
            header("location:".SITEURL.'admin/add-admin.php'  );
        }
    } 
?>


























