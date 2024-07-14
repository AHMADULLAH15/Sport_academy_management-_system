<?php

    session_start();
    if(!isset($_SESSION['AdminLoginId']))
    {
        header("Location: admin_login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Dashboard</title>
    <script src="https://kit.fontawesome.com/1165876da6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <header>
        <img src="picture/logo.jpg" alt="AHMAD" class="logo">
        <h4>Admin Dashboard</h4>
        <ul>
            <li><a href="index.php"><i class='bx bxs-home'></i></a></li>
            <li><a href="login.php"><i class='bx bx-user'></i></a></li>
            <li><button id="toggle-sidebar" class="toggle-sidebar"><i class='bx bx-menu'></i></button></li>
        </ul>
    </header>
    <aside id="sidebar">
        <ul>
            <li><a href="#users"><i class="fas fa-users"></i> Manage Users</a></li>
            <li><a href="#"><i class="fas fa-users"></i> Manage Cricket Academy</a></li>
            <li><a href="#"><i class="fas fa-users"></i> Manage Football Academy</a></li>
            <li><a href="#schedules"><i class="fas fa-calendar-alt"></i> Manage Schedules</a></li>
            <li><a href="#events"><i class="fas fa-futbol"></i> Manage Events</a></li>
            <li><a href="#reports"><i class="fas fa-chart-line"></i> View Reports</a></li>
            <li><a href="#settings"><i class="fas fa-cogs"></i> Settings</a></li>
        </ul>
    </aside>
    <main>
        <section id="welcome">
        <h1>Welcome -  <?php  echo $_SESSION['AdminLoginId']?></h1>
        </section>
        <section id="users">
            <h2><a href="manage_users.php">Manage Users</a></h2>
            <!-- Content for managing users -->
        </section>
        <section id="academy">
            <h2><a href="manage_cricket_academy.php">Manage Cricket Academy</a></h2>
            <!-- Content for managing users -->
        </section>
        <section id="academy">
            <h2><a href="manage_football_academy.php">Manage Football Academy</a></h2>
            <!-- Content for managing users -->
        </section>
        
        <section id="events">
            <h2>Manage Events</h2>
            <!-- Content for managing events -->
        </section>
        <section id="reports">
            <h2>View Reports</h2>
            <!-- Content for viewing reports -->
        </section>
        <section id="settings">
            <h2>Settings</h2>
            <!-- Content for settings -->
        </section>
        <br>
        <div class="adminname">
            <form method="POST">
            <button name ="logout" style="font-size: 25px; cursor:pointer;border-radius:5px">Log out</button>
            </form>
        </div>
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
    <script>
        document.getElementById('toggle-sidebar').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });
    </script>
<?php

    if(isset($_POST['logout']))
    {
        session_destroy();
        header("Location: admin_login.php");
    }
?>
</body>
</html>
