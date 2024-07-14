<?php
session_start();

// Redirect to login page if the user is not logged in
if (!isset($_SESSION['UserLoginId'])) {
    header("Location: login.php");
    exit();
}

require('admin_connection.php');

// Fetch the user's profile information
$userEmail = $_SESSION['UserLoginId'];
$sql = "SELECT first_name, last_name, phone, email FROM users_registrations WHERE email = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param('s', $userEmail);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit();
}
?>
<style>

    section, button,a
    {
        margin: 0 auto;
        font-size: 30px;
        text-decoration: none;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user_dashboard.css">
    <title>User Profile</title>
</head>
<body>
    <header>
        <img src="picture/logo.jpg" alt="AHMAD" class="logo">
        <h4>User Dashboard</h4>
        <ul>
            <li><a href="user_dashboard.php"><i class='bx bxs-home'></i></a></li>
            <li><a href="#"><i class='bx bx-user'></i></a></li>
        </ul>
    </header>
    <aside id="sidebar">
        <ul>
            <li><a href="profile.php"><i class="fas fa-user"></i> Profile</a></li>
            <li><a href="#schedules"><i class="fas fa-calendar-alt"></i> Schedules</a></li>
            <li><a href="#my academy"><i class="fas fa-futbol"></i>My Academy</a></li>
            <li><a href="#classes"><i class="fas fa-dumbbell"></i> Classes</a></li>
            <li><a href="#notifications"><i class="fas fa-bell"></i> Notifications</a></li>
        </ul>
    </aside>
    <main>
        <section id="profile" >
            <h2>Profile</h2><br>
            <p><strong>First Name:</strong> <?php echo htmlspecialchars($user['first_name']); ?></p>
            <br>
            <p><strong>Last Name:</strong> <?php echo htmlspecialchars($user['last_name']); ?></p>
            <br>
            <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
            <br>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <br>
            <button type="button"><a href="#">Update</a></button>
        </section>
    </main>
    <!-- <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Email</th>
        </tr>
        <th>
            <td><?php echo htmlspecialchars($user['first_name']); ?></td>
            <td><?php echo htmlspecialchars($user['last_name']); ?></td>
            <td><?php echo htmlspecialchars($user['phone']);?></td>
            <td><?php echo htmlspecialchars($user['email']);?></td>
        </th>
    </table> -->
    <br><br><br><br>
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
