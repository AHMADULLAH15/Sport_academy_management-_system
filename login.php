<?php
    require('admin_connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login - Sports Academy Management System</title>
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
    </header>

    <div class="login-container">
        <h2>Login</h2>
        <div class="login-role">
            
            <a href="#" onclick="setRole('user')">User</a>
            <a href="admin.php" onclick="setRole('admin')">Admin</a>
            <!-- <a href="#" onclick="setRole('player')">Player</a> -->
        
        </div>
        <form method="post">
            <input type="hidden" id="role" name="role" required>
            <div class="login-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="login-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="login-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <a style="color: blue;" href="registration.php">Create a new account?</a>
            <button type="submit" class="login" name="login">Login</button>
        </form>
    </div>
    <br><br><br>
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
    if(isset($_POST['login'])) {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        
        $sql = "SELECT * FROM `users_registrations` WHERE `email` = '$email'";
        $result = mysqli_query($con, $sql);
        
        if($result) {
            if(mysqli_num_rows($result) == 1) {
                $result_fetch = mysqli_fetch_assoc($result);
                if(password_verify($password, $result_fetch['password'])) {
                    session_start();
                    $_SESSION['UserLoginId'] = $_POST['email'];
                    $_SESSION['user_email'] = $_POST['email'];
                // header("Location: user_dashboard.php");
                    echo "<script>alert('Login Successfully');
                    window.location.href = 'user_dashboard.php';
                    </script>";
                } else {
                    echo "<script>alert('Invalid Email or Password')</script>";
                }
            } else {
                echo "<script>alert('Invalid Email or Password')</script>";
            }
        } else {
            echo "<script>alert('Cannot Run Query');
            window.location.href = 'login.php';
            </script>";
        }
    }
?>
</body>
</html>
