<?php include 'Partials/Header.php' ?>

    <!-- About Page -->

    <section>
        <div class="wrapper">
            <div class="about">
            <?php 
         if(isset($_SESSION['login_register']))
         {
            echo $_SESSION['login_register'];
            unset($_SESSION['login_register']);
         }
        ?>
                <br>
                <h1>About Us</h1>
                <p>National STD/AIDS Control Programme</p>
                <p>No.29, De Saram place, Colombo 10, Sri Lanka.</p> <br>

                <p></p><i class="fas fa-phone-volume"></i> +94 26 67163</p>
                <p><i class="fas fa-blender-phone"></i> +94 2665277</p>
                
                <p><img src="https://www.aidscontrol.gov.lk/images/gic_en.gif" alt=""></p>
            </div>
        </div>
    </section>


<?php include 'Partials/Footer.php' ?>    