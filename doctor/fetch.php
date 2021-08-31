<?php

sleep(1);

include('../config.php');

if(isset($_POST['request']))
{
    $request = $_POST['request'];

    $query = "SELECT * FROM appointments WHERE doctor = '$request'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    


?>

<table class="tbl-full">

        <?php

            if($count){

            

        ?>

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
        }
        else
        {
            echo "No Appointments.";
        }
        ?>

        
            <?php

                $sn =1; // Create a variable and assign the value

                

                while($row = mysqli_fetch_assoc($result)){

                    
                    ?>

                <tr>
                    <?php $id =  $row['id']; ?>  <!-- Getting id For Delete Appointment -->
                    <td><?php echo $sn++; ?></td>
                    <td><?php echo $row['doctor']; ?></td>
                    <td><?php echo $row['full_name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['phone_no']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['ap_date']; ?></td>
                    <td><?php echo $row['time']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td>
                        <a href="<?php echo SITEURL; ?>doctor/delete-appointment.php?id=<?php echo $id ?>"
                            class="btn-danger">Delete</a>
                    </td>
                </tr>

                <?php
            }
                ?>
        
</table>

<?php
}
?>