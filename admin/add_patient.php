<?php
ob_start();
include('partials/header.php');
?>

    <div class="dashboard">   
        
            <h1>Add Patients</h1>

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
                        <td>Full Name: </td>
                        <td>
                            <input type="text" name="full_name" placeholder="Enter Full Name">
                        </td>
                    </tr>
                    <tr>
                        <td>Age: </td>
                        <td>
                            <input type="text" name="age" placeholder="Enter Age">
                        </td>
                    </tr>
                    <tr>
                        <td>NIC No: </td>
                        <td>
                            <input type="text" name="nic_no" placeholder="Enter NIC no">
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
                            <input type="submit" name="submit" value="Add Patients" class="btn-secondary">
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
        $full_name = $_POST['full_name'];
        $age = $_POST['age'];
        $nic_no = $_POST['nic_no'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        
        // 2. Sql query to save the data to DB
        $sql = "INSERT INTO patients SET 
            full_name = '$full_name',
            age = '$age',
            nic_no = '$nic_no',
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
            $_SESSION['add'] = "<div class='success'>Patient Added Successfully</div>";
            // Redirect Page
            header("location:".SITEURL.'admin/patients.php');
        }
        else
        {
            // Failed to Insert Data
            // echo "Failed to Insert Data";
            // Create a session variable to display message
            $_SESSION['add'] = "<div class='error'>Failed to Add Patient</div>";
            // Redirect Page Add patient
            header("location:".SITEURL.'admin/add-patient.php'  );
        }
    } 
?>


























