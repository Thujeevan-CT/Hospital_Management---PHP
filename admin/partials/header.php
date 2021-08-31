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
    <link rel="icon" href="../img/ico.ico">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Admin Dashboard</title>
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
                
                    <li><a href="index.php">Admin</a></li>
                    <li><a href="doctors.php">Doctors</a></li>
                    <li><a href="patients.php">Patients</a></li>
                    <li><a href="appointment.php">Appointments</a></li>
                    <li><a href="logout.php">Logout <i class="fas fa-sign-out-alt"></i></a></li>

                </ul>
            </div>    
        </div>
    </section>