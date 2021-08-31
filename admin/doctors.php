<?php include('partials/header.php'); ?>

    <!-- Doctor - Body Section -->

    <section>
        <div class="dashboard">
            <h1>Doctors List</h1>
            <br>

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; // displaying session message
                    unset($_SESSION['add']); // removing session message 
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION[delete]; // display session msg
                    unset($_SESSION[delete]); // Remove session msg
                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION[update]; // display session msg
                    unset($_SESSION[update]); // Remove session msg
                }

            ?>

            <!-- Button to ADD Doctor -->
            <a href="add-doctors.php" class="btn-primary">Add Doctors</a>
            <br/> <br> 

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Username</th>
                    <th class="studies">Studies</th>
                    <th>Image</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>

                <?php
                    // Query to get All Doctor
                    $sql = "SELECT * FROM doctors";
                    // Execute the query
                    $res = mysqli_query($conn, $sql);

                    // Check whether the query is Executed or Not
                    if($res==TRUE)
                    {
                        // Count rows to check whether we have data in database or not
                        $count = mysqli_num_rows($res); // Function to get all the rows in database

                        $sn =1; // Create a variable and assign the value

                        // Check the num of rows
                        if($count>0)
                        {
                            // We have in database
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                // using while loop to get all the data from database
                                // and while loop will run as long as we have data in database

                                // Get individual data
                                $id=$rows['id'];
                                $username=$rows['username'];
                                $study=$rows['study'];
                                $img=$rows['img'];
                                $email=$rows['email'];
                                $password=$rows['password'];

                                // display the values in table
                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td><?php echo $study; ?></td>

                                    <td>
                                        <?php 
                                            // Check whether image name is available or not
                                            if($img!=="")
                                            {
                                                // Display the Image 
                                                ?>
                                                <img src="<?php echo SITEURL; ?>img/doctor/<?php echo $img; ?>" class="db_img">

                                                <?php
                                            }
                                            else
                                            {
                                                // Display the Message
                                                echo "<div class='error'>Image not Added</div>";
                                            }
                                        ?>
                                    </td>

                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $password; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>admin/update-doctor.php?id=<?php echo $id ?>" class="btn-secondary">Update Doctor</a> 
                                        <a href="<?php echo SITEURL; ?>admin/delete-doctor.php?id=<?php echo $id ?>" class="btn-danger">Delete Doctor</a>
                                    </td>
                                </tr>

                                <?php
                                
                            }
                        }
                        else
                        {
                            // We don not have data in Database
                            // We'll display the message inside table
                            ?>

                            <tr>
                                <td colspan="7"><div class="error">No Doctors Added.</div></td>
                            </tr>

                            <?php

                        }
                    }
                ?>

                
            </table>

        </div>
    </section>


<?php include('partials/footer.php'); ?>

