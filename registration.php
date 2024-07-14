<?php
    require("admin_connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registration.css">
    <title>User Registration</title>
    <script src="https://kit.fontawesome.com/1165876da6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <header>
        <img src="picture/logo.jpg" alt="AHMAD" class="logo">
        <h4>Sports Academy Management System</h4>
        <ul>
            <li><a href="login.php"><i class='bx bxs-home'></i></a></li>
            <li><a href="#"><i class='bx bx-user'></i></a></li>
        </ul>
    </header>
    <div class="container">
        <h2>Registration</h2>
        <form method="POST">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <!-- <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div> -->
            <div class="form-group">
                <button type="submit" name="register" class="register">Register</button>
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
            &copy; 2024 Sport Academy Management System.com | Designed by [Ahmadullah]
        </div>
    </footer>

    <?php
    if(isset($_POST['register']))
    {
        // Check the connection
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Check if the email already exists
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $user_exist_query = "SELECT * FROM `users_registrations` WHERE `email` = '$email'";
        $result = mysqli_query($con, $user_exist_query);

        if($result)
        {
            if(mysqli_num_rows($result) > 0)
            {
                $result_fetch = mysqli_fetch_assoc($result);
                if($result_fetch['email'] == $email)
                {
                    echo "<script>alert('$result_fetch[email] - email already registered');
                    window.location.href = 'registration.php';
                    </script>";
                }
            }
            else
            {
                $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
                $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
                $phone = mysqli_real_escape_string($con, $_POST['phone']);
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

                $query = "INSERT INTO `users_registrations`(`first_name`, `last_name`, `email`, `phone`, `password`) VALUES ('$first_name', '$last_name', '$email', '$phone', '$password')";

                if(mysqli_query($con, $query))
                {
                    echo "<script>alert('Registration Successful');
                    window.location.href = 'login.php';
                    </script>";
                }
                else
                {
                    echo "<script>alert('Cannot Run Query');
                    window.location.href = 'registration.php';
                    </script>";
                }
            }
        }
        else
        {
            echo "<script>alert('Cannot Run Query');
            window.location.href = 'registration.php';
            </script>";
        }
    }
    ?>
</body>
</html>
