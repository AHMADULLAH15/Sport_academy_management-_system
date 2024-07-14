<?php
    require('admin_connection.php');

    date_default_timezone_set('Asia/Dhaka');
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $academy_name = $_POST['academy_name'];
        $academy_address = $_POST['academy_address'];
        $academy_phone = $_POST['academy_phone'];
        $academy_email = $_POST['academy_email'];
        $registration_fee = $_POST['registration_fee'];
        $monthly_fee = $_POST['monthly_fee'];
        $venue = $_POST['venue'];
        $coach = $_POST['coach'];
        $date_of_registration_academy = date('Y-m-d H:i:s');

        $sql = "INSERT INTO cricket_academy_list_ctg (academy_name, academy_address, academy_phone, academy_email, registration_fee, monthly_fee, venue, coach, date_of_registration_academy)
                VALUES ('$academy_name', '$academy_address', '$academy_phone', '$academy_email', '$registration_fee', '$monthly_fee', '$venue', '$coach', '$date_of_registration_academy')";

        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Added Cricket Academy Successful');
                    window.location.href = 'manage_cricket_academy.php';
                    </script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }

        mysqli_close($con);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Cricket Academy</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/1165876da6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        header {
            background-color: black;
            color: white;
            text-align: center;
            font-size: 24px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
        }
        header .logo {
            height: 50px;
            width: 50px;
            border-radius: 50%;
        }
        header ul {
            display: flex;
            list-style: none;
        }
        header ul li {
            margin-left: 20px;
        }
        header ul li a {
            color: white;
            font-size: 24px;
        }
        footer {
            background-color: black;
            color: white;
            padding: 50px 0;
        }
        .footer-content {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .footer-section {
            flex: 1;
            min-width: 250px;
            margin-bottom: 20px;
        }
        .footer-section h3 {
            margin-bottom: 15px;
        }
        .footer-section ul {
            padding: 0;
            list-style: none;
        }
        .footer-section ul li {
            display: inline-block;
            margin-right: 10px;
        }
        .footer-section ul li a {
            color: white;
            font-size: 24px;
        }
        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            background-color: #333;
            color: white;
            margin-bottom: -80px;
        }
        .container {
            flex: 1;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin: auto;
            font-size: 25px;
        }
        table, th, td {
            border: 1px solid black;
            text-align: center;
            padding: 10px;
        }
        th {
            background-color: #f2f2f2;
        }
        .form-container {
            width: 80%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            font-size: 18px;
        }
        .btn-submit {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-submit:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<header>
    <img src="picture/logo.jpg" alt="AHMAD" class="logo">
    <h4>Add Cricket Academy</h4>
    <ul>
        <li><a href="admin.php"><i class='bx bxs-home' style="font-size: 25px;"></i></a></li>
        <li><a href="admin_login.php"><i class='bx bx-user' style="font-size: 25px;"></i></i></a></li>
        <!-- <li><a href="add_academy.php" class="btn btn-edit" id="add">Add Academy</a></li> -->
    </ul>
</header>
<div class="container">
    <div class="form-container">
        <form action="add_cricket_academy.php" method="POST">
            <div class="form-group">
                <label for="academy_name">Academy Name:</label>
                <input type="text" id="academy_name" name="academy_name" required>
            </div>
            <div class="form-group">
                <label for="academy_address">Academy Address:</label>
                <input type="text" id="academy_address" name="academy_address" required>
            </div>
            <div class="form-group">
                <label for="academy_phone">Academy Phone Number:</label>
                <input type="text" id="academy_phone" name="academy_phone" required>
            </div>
            <div class="form-group">
                <label for="academy_email">Academy Email:</label>
                <input type="email" id="academy_email" name="academy_email" required>
            </div>
            <div class="form-group">
                <label for="registration_fee">Registration Fee:</label>
                <input type="number" id="registration_fee" name="registration_fee" required>
            </div>
            <div class="form-group">
                <label for="monthly_fee">Monthly Fee:</label>
                <input type="number" id="monthly_fee" name="monthly_fee" required>
            </div>
            <div class="form-group">
                <label for="venue">Venue:</label>
                <input type="text" id="venue" name="venue" required>
            </div>
            <div class="form-group">
                <label for="coach">Coach:</label>
                <input type="text" id="coach" name="coach" required>
            </div>
            <button type="submit" class="btn-submit">Add Academy</button>
        </form>
    </div>
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
</body>
</html>
