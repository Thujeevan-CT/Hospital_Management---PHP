<?php include('partials/header.php'); ?>

    <!-- Appointments - Body Section -->

    <section>
        <div class="dashboard">
            <h1>Appointments List</h1>
            <br>

            <?php

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION[delete]; // display session msg
                    unset($_SESSION[delete]); // Remove session msg
                }

            ?>

            <br>

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Doctors</th>
                    <th>Full Name</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th class="a_date">Access Date</th>
                    <th class="time">Time</th>
                    <th class="date">Date</th>
                    <th>Action</th>
                </tr>

                <?php
                    // Query to get All appointments
                    $sql = "SELECT * FROM appointments";
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
                                $doctor=$rows['doctor'];
                                $full_name=$rows['full_name'];
                                $age=$rows['age'];
                                $address=$rows['address'];
                                $phone_no=$rows['phone_no'];
                                $email=$rows['email'];
                                $ap_date=$rows['ap_date'];
                                $time=$rows['time'];
                                $date=$rows['date'];

                                // display the values in table
                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $doctor; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $age; ?></td>
                                    <td><?php echo $address; ?></td>
                                    <td><?php echo $phone_no; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $ap_date; ?></td>
                                    <td><?php echo $time; ?></td>
                                    <td><?php echo $date; ?></td>
                                    <td>
                                       <!-- #<a href="#<?php #echo SITEURL; ?>admin/update-doctor.php?id=#<?php #echo $id ?>" class="btn-secondary">Update Doctor</a>  -->
                                        <a href="<?php echo SITEURL; ?>admin/delete-appointment.php?id=<?php echo $id ?>" class="btn-danger">Delete</a>
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
                                <td colspan="11"><div class="error">No Appointments Added.</div></td>
                            </tr>

                            <?php

                        }
                    }
                ?>

                
            </table>
            

        </div>
    </section>


<?php include('partials/footer.php'); ?>

