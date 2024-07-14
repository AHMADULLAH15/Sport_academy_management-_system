<?php
require('admin_connection.php');

// Fetch existing academy data
if (isset($_GET['academy_email'])) {
    $academy_email = $_GET['academy_email'];

    $sql = "SELECT * FROM `football_academy_list_ctg` WHERE `academy_email` = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param('s', $academy_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $academy = $result->fetch_assoc();
        $stmt->close();
    } else {
        header('Location: manage_football_academy.php');
        exit;
    }
} else {
    header('Location: manage_football_academy.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit football Academy</title>
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
            min-height: 100vh;
            flex-direction: column;
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
        .btn {
            display: inline-block;
            font-size: 16px;
            padding: 3px;
            margin: 5px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        .btn-edit {
            background-color: #007bff;
            color: white;
        }
        .btn-edit:hover {
            background-color: #0056b3;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
        form,input
        {
            font-size: 40px;
        }
        .form-container
        {
            width: 70%;
            border: 1px solid black;
            margin: auto;
            padding: 20px 30px;
        }

    </style>
</head>
<body>
<header>
    <img src="picture/logo.jpg" alt="AHMAD" class="logo">
    <h4>Edit Football Academy</h4>
    <ul>
        <li><a href="admin.php"><i class='bx bxs-home' style="font-size: 25px;"></i></a></li>
        <li><a href="admin_login.php"><i class='bx bx-user' style="font-size: 25px;"></i></a></li>
    </ul>
</header><br><br><br>
<div class="container">
    <div class="form-container">
        <form action="update_football_academy.php" method="POST">
            <input type="hidden" name="academy_email" value="<?php echo htmlspecialchars($academy['academy_email']); ?>">
            <div class="form-group">
                <label for="academy_name">Academy Name:</label>
                <input type="text" id="academy_name" name="academy_name" value="<?php echo htmlspecialchars($academy['academy_name']); ?>" required>
            </div><br>
            <div class="form-group">
                <label for="academy_address">Academy Address:</label>
                <input type="text" id="academy_address" name="academy_address" value="<?php echo htmlspecialchars($academy['academy_address']); ?>" required>
            </div><br>
            <div class="form-group">
                <label for="academy_phone">Academy Phone Number:</label>
                <input type="text" id="academy_phone" name="academy_phone" value="<?php echo htmlspecialchars($academy['academy_phone']); ?>" required>
            </div><br>
            <div class="form-group">
                <label for="registration_fee">Registration Fee:</label>
                <input type="number" id="registration_fee" name="registration_fee" value="<?php echo htmlspecialchars($academy['registration_fee']); ?>" required>
            </div><br>
            <div class="form-group">
                <label for="monthly_fee">Monthly Fee:</label>
                <input type="number" id="monthly_fee" name="monthly_fee" value="<?php echo htmlspecialchars($academy['monthly_fee']); ?>" required>
            </div><br>
            <div class="form-group">
                <label for="venue">Venue:</label>
                <input type="text" id="venue" name="venue" value="<?php echo htmlspecialchars($academy['venue']); ?>" required>
            </div><br>
            <div class="form-group">
                <label for="coach">Coach:</label>
                <input type="text" id="coach" name="coach" value="<?php echo htmlspecialchars($academy['coach']); ?>" required>
            </div><br>
            <button type="submit" class="btn-submit" name = "fbtn"style="font-size: 30px; margin-left:40%; cursor: pointer;">Update Academy</button>
        </form>
    </div>
</div><br><br><br>
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
</body>
</html>
