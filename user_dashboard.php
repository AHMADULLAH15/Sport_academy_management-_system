<?php

    session_start();
    if(!isset($_SESSION['UserLoginId']))
    {
        header("Location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user_dashboard.css">
    <title>User Dashboard</title>
    <script src="https://kit.fontawesome.com/1165876da6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <header>
        <img src="picture/logo.jpg" alt="AHMAD" class="logo">
        <h4>User Dashboard</h4>
        <!-- <button id="toggle-sidebar" class="toggle-sidebar"><i class='bx bx-menu'></i></button> -->
        <ul>
            <li><a href="index.php"><i class='bx bxs-home'></i></a></li>
            <li><a href="#"><i class='bx bx-user'></i></a></li>
            <li><button id="toggle-sidebar" class="toggle-sidebar"><i class='bx bx-menu'></i></button></li>
        </ul>
    </header>
    <aside id="sidebar">
        <ul>
            <li><a href="profile.php"><i class="fas fa-user"></i> Profile</a></li>
            <li><a href="#schedules"><i class="fas fa-calendar-alt"></i> Schedules</a></li>
            <li><a href="show_academy.php"><i class="fas fa-futbol"></i>My Academy</a></li>
            <li><a href="#classes"><i class="fas fa-dumbbell"></i> Classes</a></li>
            <li><a href="#notifications"><i class="fas fa-bell"></i> Notifications</a></li>
        </ul>
    </aside>
    <main>
        <section id="welcome">
        <h3>Welcome -  <?php  echo $_SESSION['UserLoginId']?></h3>
        </section>
        <section id="profile">
            <h2><a href="profile.php">Profile</a></h2>
            <!-- Content for user profile -->
        </section>
        <section id="schedules">
            <h2>Schedules</h2>
            <!-- Content for user schedules -->
        </section>
        <section id="events">
            <a href="show_academy.php"><h2>My Academy</h2></a>
            <!-- Content for user events -->
        </section>
        <section id="classes">
            <h2>Classes</h2>
            <!-- Content for user classes -->
        </section>
        <section id="notifications">
            <h2>Notifications</h2>
            <!-- Content for user notifications -->
        </section>
        <section id="logout">
        <form method="POST">
                <button name ="logout" style="font-size: 25px; cursor:pointer;border-radius:5px">Log out</button>
            </form>
        </section>
    </main>
    <footer>
    <div class="footer-content">
        <div class="footer-section about">
            <h3>About Us</h3>
            <p>What We Offer <br>
                Our Sports Academy Management System provides a centralized database of sports academies, enabling users to view and compare various options based on location, sport, and other key criteria. Whether you're looking for a cricket academy in Chittagong, a football training center in Dhaka, or a badminton academy in Sylhet, our platform covers it all.</p>
        </div>
        <div class="footer-section contact">
            <h3>Contact Info</h3>
            <p>Email: sportacademy@gmail.com<br>Phone: 01827093405<br>Address: Anowara, Chittagong, Bangladesh</p>
        </div>
        <div class="footer-section social">
            <h3>Follow Us</h3>
            <ul>
                <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; 2024  Sport Academy Management System.com | Designed by [Ahmadullah]
    </div>
</footer>
    </footer>
    <script>
        document.getElementById('toggle-sidebar').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });
    </script>
    <?php

if(isset($_POST['logout']))
{
    session_destroy();
    header("Location: login.php");
}
?>
</body>
</html>
