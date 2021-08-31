<?php include 'Partials/Header.php'?>

<!-- Clinic Details -->

<section>
    <div class="wrapper">
        <div class="cd">

            <h2><i class="fas fa-exclamation-circle"></i> You Must Need to Register or Login for Get an Appointment. Go
                to <a href="login_register.php">Login page <i class="fas fa-sign-in-alt"></i></a></h2>

            <br>

            <h3>STD Clinic Hours</h3>

            <table class="redTable">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tr>
                    <td>Monday</td>
                    <td>8.00am to 4.00pm</td>
                </tr>
                <tr>
                    <td>Tuesday</td>
                    <td>8.00am to 4.00pm</td>
                </tr>
                <tr>
                    <td>Wednesday</td>
                    <td>8.00am to 4.00pm</td>
                </tr>
                <tr>
                    <td>Thursday</td>
                    <td>8.00am to 4.00pm</td>
                </tr>
                <tr>
                    <td>Friday</td>
                    <td>8.00am to 4.00pm</td>
                </tr>
                <tr>
                    <td>Saturday</td>
                    <td>9.00am to 1.00pm</td>
                </tr>
                <tr>
                    <td>Sunday</td>
                    <td>Closed</td>
                </tr>
                <tr>
                    <td>Public holidays</td>
                    <td>Closed</td>
                </tr>
                <tr>
                    <td>Poya days</td>
                    <td>Closed</td>
                </tr>
            </table>

            <br>

            <h3 class="text-center">Our Doctors</h3>

            <div class="flex-container">

                <?php
                    // Create SQL Query to display Doctors from Database
                    $sql = "SELECT * FROM doctors";
                    // Execute the Query
                    $res = mysqli_query($conn, $sql);
                    // Count rows to check whether the category is available or not
                    $count = mysqli_num_rows($res);
                    
                    if($count>0)
                    {
                        // Doctors Available
                        while($row=mysqli_fetch_assoc($res))
                        {
                            // Get the Values like id, username, study, image
                            $id = $row[id];
                            $username = $row['username'];
                            $study = $row['study'];
                            $img = $row['img'];
                            ?>

                            <div>
                                <div class="a-box">
                                    <div class="img-container">
                                        <div class="img-inner">
                                            <div class="inner-skew">
                                                <?php
                                                    // Check whether Image available or Not
                                                    if($img=="")
                                                    {
                                                        // Display Message
                                                        echo "<div class='error'>Images not Available</div>";
                                                    }
                                                    else
                                                    {
                                                        // Images Available
                                                        ?>
                                                        <img src="<?php echo SITEURL; ?>/img/doctor/<?php echo $img; ?>">
                                                        <?php
                                                    }
                                                ?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-container">
                                        <h3><?php echo $username; ?></h3>
                                        <div>
                                            <?php echo $study; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                    }
                    else
                    {
                        // Doctors Not Available
                        echo "<div class='error'>Doctors Not Added</div>";
                    }
                ?>

            </div>


        </div>
    </div>
</section>

<?php include 'Partials/Footer.php' ?>