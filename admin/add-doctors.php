<?php
ob_start();
include('partials/header.php');
?>

    <div class="dashboard">   
        
            <h1>Add Doctor</h1>

            <br>

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; // displaying session message
                    unset($_SESSION['add']); // removing session message 
                }

                if(isset($_SESSION['upload']))
                {
                    echo $_SESSION['upload']; // displaying session message
                    unset($_SESSION['upload']); // removing session message 
                }
            ?>

            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-30">
                    <tr>
                        <td>Username: </td>
                        <td>
                            <input type="text" name="username" placeholder="Enter Username">
                        </td>
                    </tr>
                    <tr>
                        <td>Studies: </td>
                        <td>
                            <textarea name="study"  cols="30" rows="5" placeholder="Studies"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Select Image: </td>
                        <td>
                        <input type="file" name="img" accept="image/*">
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
                            <input type="submit" name="submit" value="Add Doctor" class="btn-secondary">
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

        // 1. Get the data from Form
        $username = $_POST['username'];
        $study = $_POST['study'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Check whether image is selected or not and set the value for image name accordingly
        // print_r($_FILES['img']);

        // die(); // Break the Code Here

        if(isset($_FILES['img']['name']))
        {
            // Upload the Image
            // To upload image we need image name, source path and destination path
            $image_name = $_FILES['img']['name'];


            $source_path = $_FILES['img']['tmp_name'];

            $destination_path = "../img/doctor/".$image_name;

            // Finally upload the Image
            $upload = move_uploaded_file($source_path, $destination_path);

            // Check whether the image is uploaded or not
            // and if the image is not uploaded then we will stop the process and redirect with error message
            if($upload==false)
            {
                // Set Message
                $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                // Redirect to Add Category Page
                header('location:'.SITEURL.'admin/add-category.php');
                // Stop the process
                die();
            }

        }
        else
        {
            // Set Image value the Image_name as blank
            $image_name="";
        }

        
        // 2. Sql query to save the data to DB
        $sql = "INSERT INTO doctors SET 
            username = '$username',
            study = '$study',
            img = '$image_name',
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
            $_SESSION['add'] = "<div class='success'>Doctor Added Successfully</div>";
            // Redirect Page
            header("location:".SITEURL.'admin/doctors.php');
        }
        else
        {
            // Failed to Insert Data
            // echo "Failed to Insert Data";
            // Create a session variable to display message
            $_SESSION['add'] = "<div class='error'>Failed to Add Doctor</div>";
            // Redirect Page Add Doctor
            header("location:".SITEURL.'admin/add-doctors.php');
        }
    } 
?>


























