<?php

    session_start();
    if(!isset($_SESSION['AdminLoginId']))
    {
        header("Location: admin_login.php");
    }
?>
<?php
    require('admin_connection.php'); // Include the database connection

    // Check if user ID is provided in the URL
    if (isset($_GET['email'])) {
        $email = $_GET['email'];

        // Fetch user details from the database
        $sql = "SELECT * FROM `users_registrations` WHERE `email` = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Close the prepared statement
            $stmt->close();
        } else {
            // If user not found, redirect back to manage users page
            header('Location: manage_users.php');
            exit;
        }
    } else {
        // If no user ID provided, redirect back to manage users page
        header('Location: manage_users.php');
        exit;
    }
?>
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
    height: 350px;

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <!-- Include your CSS and JS files here -->
    <script src="https://kit.fontawesome.com/1165876da6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<header>
        <img src="picture/logo.jpg" alt="AHMAD" class="logo">
        <h4>Update User Information</h4>
        <ul>
            <li>
                <li><a href="#"><i class='bx bxs-home' ></i></a></li>
                <li><a href="#"><i class='bx bx-user'></i></a></li>
            </li>
        </ul>
    </header><br><br><br>
<body>
    <!-- Your HTML code for the edit form -->
    <div class="box">
    <h2>Edit User</h2><br><br>
    <form action="update_user.php" method="post">
        <input type="hidden" name="email" value="<?php echo $user['email']; ?>">
        <!-- Include form fields to edit user details -->
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo $user['first_name']; ?>"><br><br>
        
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo $user['last_name']; ?>"><br><br>
        
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $user['phone']; ?>"><br><br>
        
        <input type="submit" value="Update">
    </form>
    </div><br><br>
</body><br><br><br>
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
