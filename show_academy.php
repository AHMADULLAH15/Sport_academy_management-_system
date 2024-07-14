<?php
session_start();
require('admin_connection.php');

// Check if user is logged in
if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit;
}

// Get the user's email from the session
$user_email = $_SESSION['user_email'];

// Fetch user's academy details from the database
$sql = "SELECT * FROM `cricket_academy_list_ctg` WHERE `academy_email` = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param('s', $user_email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $academy = $result->fetch_assoc();
} else {
    echo "No academy found for this user.";
    exit;
}

$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Academy</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/1165876da6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
        /* Add your styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 20px;
        }
        .academy-details {
            margin: 20px 0;
        }
        .academy-details h2 {
            margin-bottom: 20px;
        }
        .academy-details p {
            font-size: 18px;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <header>
        <!-- Add your header content here -->
    </header>
    <div class="container">
        <div class="academy-details">
            <h2>My Academy</h2>
            <p><strong>Academy Name:</strong> <?php echo htmlspecialchars($academy['academy_name']); ?></p>
            <p><strong>Academy Address:</strong> <?php echo htmlspecialchars($academy['academy_address']); ?></p>
            <p><strong>Academy Phone Number:</strong> <?php echo htmlspecialchars($academy['academy_phone']); ?></p>
            <p><strong>Registration Fee:</strong> <?php echo htmlspecialchars($academy['registration_fee']); ?></p>
            <p><strong>Monthly Fee:</strong> <?php echo htmlspecialchars($academy['monthly_fee']); ?></p>
            <p><strong>Venue:</strong> <?php echo htmlspecialchars($academy['venue']); ?></p>
            <p><strong>Coach:</strong> <?php echo htmlspecialchars($academy['coach']); ?></p>
        </div>
    </div>
    <footer>
        <!-- Add your footer content here -->
    </footer>
</body>
</html>
