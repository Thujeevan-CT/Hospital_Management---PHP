<?php include('partials/header.php'); ?>

    <!-- Doctor - Body Section -->

    <section>
        <div class="dashboard">
            <h1>Patients List</h1>

            <br> 

            <br/>

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Full Name</th>
                    <th>Age</th>
                    <th>NIC No</th>
                    <th>Email</th>
                    <th>Password (Encrypted)</th>
                </tr>

                <?php
                    // Query to get All patients
                    $sql = "SELECT * FROM patients";
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
                                $full_name=$rows['full_name'];
                                $age=$rows['age'];
                                $nic_no=$rows['nic_no'];
                                $email=$rows['email'];
                                $password=$rows['password'];

                                // display the values in table
                                ?>

                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $age; ?></td>
                                    <td><?php echo $nic_no; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo $password; ?></td>
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
                                <td colspan="7"><div class="error">No Patients Added</div></td>
                            </tr>

                            <?php
                        }
                    }
                ?>

                
            </table>

        </div>
    </section>


<?php include('partials/footer.php'); ?>

