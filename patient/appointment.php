<?php
ob_start();
include 'Partials/Header.php'
?>

    <?php
        // Check whether Doctor id is set or not
        if(isset($_GET['doctor_id']))
        {
            // Get the Doctor id and details of the selected Doctor
            $doctor_id = $_GET['doctor_id'];

            // Get the details of the selected Doctor
            $sql = "SELECT * FROM doctors WHERE id=$doctor_id";

            // Execute the Query
            $res = mysqli_query($conn, $sql);

            // Count the rows
            $count = mysqli_num_rows($res);

            // check whether the data is available or not
            if($count==1)
            {
                // We have Data
                $row = mysqli_fetch_assoc($res);
                $username = $row['username'];
            }
            else
            {
                // No Data Available
                // Redirect Homepage
                header('location:'.SITEURL.'patient/');
            }

        }
        else
        {
            // redirect to homepage
            header('location:'.SITEURL.'patient/');
            
        }
    ?>

<!-- Appointment Details -->

<section>
    <div class="wrapper">
        <div class="gap-box">
            <div class="appointment">
                <div class="left-g">
                    <img src="../img/Booking.svg" alt="">
                </div>
                
                <div class="right-g">
                    <h1>Appointment</h1>

                    <div class="form-appointment">

                        <form action="" method="post">

                            <div class="field">
                                <label for="doctor">Doctor Name: <span><?php echo $username ?></span></label>
                                <input type="hidden" value="<?php echo $username ?>" name="doctor_name">
                            </div>
                            <div class="field">
                                <label for="full_name">Full Name: </label>
                                <input type="text" placeholder="Full Name" name="full_name">
                            </div>
                            <div class="field">
                                <label for="age">Age: </label>
                                <input type="text" placeholder="Age" name="age">
                            </div>
                            <div class="field">
                                <label for="address">Address: </label>
                                <input type="text" placeholder="Address" name="address">
                            </div>
                            <div class="field">
                                <label for="ph_no">Phone No: </label>
                                <input type="text" placeholder="Phone No" name="phone_no">
                            </div>
                            <div class="field">
                                <label for="email">Email: </label>
                                <input type="email" placeholder="Email" name="email">
                            </div>
                            <div class="field">
                                <label for="date">Appointment Date: </label>
                                <input type="date" id="date" name="ap_date">
                            </div>
                            <div class="field">
                                <label for="time">Appointment Time: </label>
                                <select name="time" id="time">
                                    <option value="8 am">8 am</option>
                                    <option value="9 am">9 am</option>
                                    <option value="10 am">10 am</option>
                                    <option value="11 am">11 am</option>

                                    <option value="1 pm">1 pm</option>
                                    <option value="2 pm">2 pm</option>
                                    <option value="3 pm">3 pm</option>
                                    <option value="4 pm">4 pm</option>
                                </select>
                            </div>
                            

                            <div class="field btn">
                                <div class="btn-layer"></div>
                                <input type="submit" value="Get Appointment" name="submit">
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>



<?php include 'Partials/Footer.php' ?>

<?php
    // Process the value from form save it in Database

    // Check whether submit is clicked or not

    if(isset($_POST['submit']))
    {

        // 1. Get the data from Form
        $doctor_name = $_POST['doctor_name'];
        $full_name = $_POST['full_name'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $phone_no = $_POST['phone_no'];
        $email = $_POST['email'];
        $time = $_POST['time'];
        $ap_date = $_POST['ap_date'];
        
        date_default_timezone_set("Asia/Kolkata");
        $access_date = date("y-m-d h:i:sa"); // Get Appointment Access date

        // Save the Appointment ind Database
        // SQL Query
        $sql2 = "INSERT INTO appointments SET
            doctor = '$doctor_name',
            full_name = '$full_name',
            age = '$age',
            address = '$address',
            phone_no = '$phone_no',
            email = '$email',
            time = '$time',
            ap_date = '$ap_date',
            date = '$access_date' 
        ";

        // Execute the Query
        $res2 = mysqli_query($conn, $sql2);
        
        // Check Whether Query Executed Successfully or Not
        if($res2==true)
        {
            // Query Executed and Appointment Saved
            $_SESSION['Appointment'] = "<div class='success'>Successfully Added Appointment.</div>";
            header('location:'.SITEURL.'patient/');
        }
        else
        {
            // Failed to Appointment order
            $_SESSION['Appointment'] = "<div class='error'>Failed to Add Appointment.</div>";
            header('location:'.SITEURL.'patient/');
        }
        
    } 
?>