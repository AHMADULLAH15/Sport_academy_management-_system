<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cricket_admission.css">
    <title>Cricket Admission Form - Sports Academy Management System</title>
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

    <div class="form-container">
        <h2>Cricket Admission Form</h2>
        <form method="POST">
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="father-name">Father's Name:</label>
                <input type="text" id="father-name" name="father_name" required>
            </div>
            <div class="form-group">
                <label for="mother-name">Mother's Name:</label>
                <input type="text" id="mother-name" name="mother_name" required>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="form-group">
                <label for="sex">Sex:</label>
                <select id="sex" name="sex" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="present-address">Present Address:</label>
                <textarea id="present-address" name="present_address" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="permanent-address">Permanent Address:</label>
                <textarea id="permanent-address" name="permanent_address" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="admission-date">Date of Admission:</label>
                <input type="date" id="admission-date" name="admission_date" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="submit">Submit</button>
            </div>
        </form>
    </div>

    <footer>
        <div class="footer-content">
            <div class="footer-section about">
                <h3>About Us</h3>
                <p>Your website description goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="footer-section contact">
                <h3>Contact Info</h3>
                <p>Email: sportacademy@gmail.com<br>Phone: 01827093405<br>Address: Anowara, Chittagong, Bangladesh</p>
            </div>
            <div class="footer-section social">
                <h3>Follow Us</h3>
                <ul>
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2024 Sport Academy Management System.com | Designed by [Ahmadullah]
        </div>
    </footer>

<?php
require('admin_connection.php');

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $dob = $_POST['dob'];
    $sex = $_POST['sex'];
    $present_address = $_POST['present_address'];
    $permanent_address = $_POST['permanent_address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $admission_date = $_POST['admission_date'];

    $query = "INSERT INTO `cricket_admission`(`full_name`, `father_name`, `mother_name`, `dob`, `sex`, `present_address`, `permanent_address`, `email`, `phone`, `date_of_addmission`) VALUES ('$name', '$father_name', '$mother_name', '$dob', '$sex', '$present_address', '$permanent_address', '$email', '$phone', '$admission_date')";

    if(mysqli_query($con, $query)) {
        echo "<script>alert('Addmission Successfully');
        window.location.href = 'registration.php';</script>";
    } else {
        echo "<script>alert('Cannot Run Query');
        window.location.href = 'cricket_admission.php';</script>";
    }
}
?>
</body>
</html>
