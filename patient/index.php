<?php include 'Partials/Header.php'; ?>

<!-- Appointment -->

<section>
    <div class="wrapper">
        <div class="gap-box">
            <br>
            <?php
               if(isset($_SESSION['login']))
               {
                  echo $_SESSION['login'];
                  unset($_SESSION['login']);
               }
            ?>

            <?php
                if(isset($_SESSION['Appointment']))
                {
                    echo $_SESSION['Appointment']; // displaying session message
                    unset($_SESSION['Appointment']); // removing session message 
                }

            ?>

            <h1>Get Appointment</h1>
            <br>
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
                                    <div>
                                        <br> <br>                                        
                                        <a href="<?php echo SITEURL; ?>patient/appointment.php?doctor_id=<?php echo $id ?>" >Get Appointment</a>
                                        <br> <br>
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