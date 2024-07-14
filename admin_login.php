<?php
    require("admin_connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin_login.css">
    <title>Admin Login</title>
    <script src="https://kit.fontawesome.com/1165876da6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <header>
        <img src="picture/logo.jpg" alt="AHMAD" class="logo">
        <h4>Sports Academy Management System</h4>
        <ul>
            <li><a href="#"><i class='bx bxs-home'></i></a></li>
            <li><a href="#"><i class='bx bx-user'></i></a></li>
        </ul>
    </header><br><br><br><br>
    <div class="container">
        <h2>Admin Login</h2>
        <form  method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="forget">
                <a href="login.php" style="text-decoration: none;">Login as a user?</a>
            </div>
            <div class="form-group">
                <button type="submit" name="login">Login</button>
            </div>
        </form>
    </div>
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

<?php

if(isset($_POST['login']))
{
    // echo "Login";
    $query = "SELECT * FROM `admin_login` WHERE `Admin_Name`= '$_POST[username]' AND `Admin_Password` = '$_POST[password]'";
    $result = mysqli_query($con, $query);
    
    if(mysqli_num_rows($result) == 1)
    {
        // echo "Correct";
        session_start();
        $_SESSION['AdminLoginId'] = $_POST['username'];
        header("Location: admin.php");
    }
    else
    {
        // echo "Wrong";
        echo "<script>alert('Incorrect Password');</script>";
    }
}
?>
</body>
</html>
