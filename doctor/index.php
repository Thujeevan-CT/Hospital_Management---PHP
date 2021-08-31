<?php 
include('partials/header.php');
?>

<!-- Doctor - Body Section -->
<!-- Appointments List -->

<section>
    <div class="dashboard">
        <h1>Appointment List</h1>

        <div class="search">
            <span>Doctors &nbsp;</span>
            <select name="fetchval" id="fetchval">
            <option value="" disabled selected>All</option>

            <!-- Getting Doctor Name for Options in Database -->

        <?php
        // Query to get All Doctor
        $sqldf = "SELECT * FROM doctors";
        // Execute the query
        $resdf = mysqli_query($conn, $sqldf);

        // Check whether the query is Executed or Not
        if($resdf==TRUE)
        {
        // Count rows to check whether we have data in database or not
        $countdf = mysqli_num_rows($resdf); // Function to get all the rows in database


        // Check the num of rows
        if($countdf>0)
        {
            // We have in database
            while($rowsdf=mysqli_fetch_assoc($resdf))
            {
                // using while loop to get all the data from database
                // and while loop will run as long as we have data in database

                // Get individual data
                $id=$rowsdf['id'];
                $username=$rowsdf['username'];

                // display the values in Select Option #
                ?>

                <option value="<?php echo $username; ?>"><?php echo $username; ?></option>                  

                <?php

            }
        }
        else
        {
            ?>

                <option value="">No Doctors at this Time.</option>


            <?php
            

        }
    }

    ?>
            </select>
        </div>


        <br> 
        <br>

        <?php
               if(isset($_SESSION['login']))
               {
                  echo $_SESSION['login'];
                  unset($_SESSION['login']);
               }

               if(isset($_SESSION['delete']))
                {
                    echo $_SESSION[delete]; // display session msg
                    unset($_SESSION[delete]); // Remove session msg
                }
            ?>

        <br>

        <div class="container">

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
                        <a href="<?php echo SITEURL; ?>doctor/delete-appointment.php?id=<?php echo $id ?>"
                            class="btn-danger">Delete</a>
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
                    <td colspan="11">
                        <div class="error">No Appointments Added.</div>
                    </td>
                </tr>

                <?php

            }
        }
    ?>


            </table>

        </div>


    </div>
</section>


<!-- Filtering by Doctors Name using JQuery  -->

<script type="text/javascript">

$(document).ready(function(){
    $("#fetchval").on('change',function(){
        var value = $(this).val();
        // alert(value);

        $.ajax({
            url:"fetch.php",
            type:"POST",
            data:'request=' + value,
            beforeSend:function(){
                $(".container").html("<span>Working...</span>");
            },
            success:function(data){
                $(".container").html(data);
            }
        });

    });
});

</script>



<?php include('partials/footer.php'); ?>