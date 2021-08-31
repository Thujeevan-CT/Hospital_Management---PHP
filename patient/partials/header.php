<?php 

    include('../config.php');
    include('login-check.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="icon" href="../img/ico.ico">
    <link rel="stylesheet" href="../css/styles.css">
    <title>National  STD/AIDS  Control  Program</title>
</head>
<body>

    <!-- Nav Bar 1 -->

    <section >
        <div class="wrapper">
            <div class="nav-1">
                <img src="../img/logo2.png" alt="National  STD/AIDS  Control  Program">
                <img src="../img/gov.png" alt="National  STD/AIDS  Control  Program">
            </div>
        </div>
    </section>

    <section>
        <div class="nav-links">
            <div class="wrapper">
                <ul>
                
                    <li><a href="home-patient.php"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="NewsRoom.php"><i class="fas fa-newspaper"></i> News Room</a></li>
                    <li><a href="ClinicDetails.php"><i class="fas fa-calendar-day"></i> Clinic Details</a></li>
                    <li><a href="<?php echo SITEURL; ?>patient/"><i class="far fa-calendar-check"></i> Get Appointment</a></li>
                    <li><a href="about.php"><i class="fas fa-clinic-medical"></i> About</a></li>
                    <li><a href="logout.php">Logout <i class="fas fa-sign-out-alt"></i></a></li>

                </ul>
            </div>    
        </div>
    </section>