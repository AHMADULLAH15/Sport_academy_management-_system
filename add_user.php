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
    <title>Add New User</title>
    <!-- Include your CSS and JS files here -->
    <script src="https://kit.fontawesome.com/1165876da6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<style>
    * {
    padding: 0;
    margin: 0;
}
body
{
    /* background-image: url(picture/R.jpeg); */
    background-repeat: no-repeat;
    background-size: cover; /* Prevent background image from repeating */
    background-color: white;
}
header
{
    background-color: black;
    color: white;
    text-align: center;
    font-size:60px;
    height: 80px;
    /* font-size: 70px; */
}
header i{
    font-size: 40px;
}
header ul li{
    float: right;
    /* display: inline-block; */
    text-decoration: none;
    list-style: none;
    margin-left: 30px;
    margin-top: -65px;
}
header a{
    color:white;
    text-decoration: none;
}
a{
    text-decoration: none;
    font-weight: bold;
    color: white;
}
.logo{
    float: left;
    height: 50px;
    width: 50px;
    margin-top: 10px;
    border-radius: 50px;
    margin-left: 30px;
}
.box
{
    border: 1px solid black;
    width: 400px;
    margin: auto;
    text-align: center;
    height: 400px;

}
.box h2
{
    border: 1px solid black;
    background-color: black;
    color: white;
}
form
{
    margin: auto;
    font-size: 30px;
}
form input
{
    font-size: 20px;
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
</style>
<header>
        <img src="picture/logo.jpg" alt="AHMAD" class="logo">
        <h4>Add new user</h4>
        <ul>
            <li>
                <li><a href="#"><i class='bx bxs-home' ></i></a></li>
                <li><a href="#"><i class='bx bx-user'></i></a></li>
            </li>
        </ul>
    </header><br><br><br>
<body>
    <!-- Your HTML code for the add user form -->
    <div class="box">
    <h2>Add New User</h2><br><br>
    <form action="insert_user.php" method="post">
        <!-- Form fields to collect user details -->
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br><br>
        
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name"><br><br>
        
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Add User">
    </form>
    </div>
</body><br><br><br><br>
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
</html>
